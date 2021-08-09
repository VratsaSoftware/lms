<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PollOption;
use App\Models\Admin\PollVote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Poll;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::with('Options', 'Options.Votes', 'Options.Votes.User')->get();

        return view('admin.polls.polls', ['polls' => $polls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'question' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'end_time' => 'required|date_format:H:i',
            'visibility' => 'required|in_array:valid_visibility.*',
            'type' => 'required|numeric|min:0|max:1',
            'options' => 'required|array|min:2',
            'for_delete' => 'sometimes|array',
        ]);

        $start_date = Carbon::parse($request->start_date . $request->start_time)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->end_date . $request->end_time)->format('Y-m-d H:i:s');

        $newPoll = new Poll;
        $newPoll->question = $request->question;
        $newPoll->start = $start_date;
        $newPoll->ends = $end_date;
        $newPoll->visibility = $request->visibility;
        $newPoll->type = $request->type;
        $newPoll->save();

        foreach ($request->options as $kId => $option) {
            if (!is_null($option) && !empty($option)) {
                $insNewOption = new PollOption;
                $insNewOption->poll_id = $newPoll->id;
                $insNewOption->option = $option;
                $insNewOption->save();
            }
        }

        $message = __('Успешно създадена анкета!');
        return redirect()->route('polls.index')->with('success', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::with('Options')->find($id);
        return view('admin.polls.edit', ['poll' => $poll]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'question' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'end_time' => 'required|date_format:H:i',
            'visibility' => 'required|in_array:valid_visibility.*',
            'type' => 'required|numeric|min:0|max:1',
            'options' => 'required|array|min:2',
            'for_delete' => 'sometimes|array',
        ]);
        $start_date = Carbon::parse($request->start_date . $request->start_time)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->end_date . $request->end_time)->format('Y-m-d H:i:s');

        $poll->question = $request->question;
        $poll->start = $start_date;
        $poll->ends = $end_date;
        $poll->visibility = $request->visibility;
        $poll->type = $request->type;
        $poll->save();

        if (isset($request->for_delete)) {
            foreach ($request->for_delete as $delOption) {
                $forDelete = PollOption::find($delOption);
                $forDelete->delete();
            }
        }

        foreach ($request->options as $kId => $option) {
            if (!is_null($option) && !empty($option)) {
                $insOption = PollOption::where([
                    ['id', $kId],
                    ['poll_id', $poll->id]
                ])->first();
                if ($insOption) {
                    $insOption->option = $option;
                    $insOption->save();
                } else {
                    $insNewOption = new PollOption;
                    $insNewOption->poll_id = $poll->id;
                    $insNewOption->option = $option;
                    $insNewOption->save();
                }
            }
        }

        $message = __('Успешно редактирана анкета!');
        return redirect()->route('polls.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePoll = Poll::find($id);
        $deletePoll->delete();

        $message = __('Успешно изтрита анкета!');
        return redirect()->route('polls.index')->with('success', $message);
    }

    public function getVotes(Poll $poll)
    {
        return view('admin.polls.poll_votes', ['poll' => $poll])->render();
    }

    public function userVote(Request $request)
    {
        if(isset($request->data)) {
            $isVoted = Poll::with('Options', 'Options.Votes')->whereHas('Options.Votes', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->find($request->poll_id);

            if (is_null($isVoted)) {
                foreach ($request->data as $optionId) {
                    $newVote = new PollVote;
                    $newVote->poll_option_id = $optionId;
                    $newVote->user_id = Auth::user()->id;
                    $newVote->save();
                }
                $poll = Poll::with('Options', 'Options.Votes')->find($request->poll_id);
                return view('admin.polls.user_after_vote', ['poll' => $poll]);
            }
            return response()->json('dublicate', 204);
        }
        return response()->json('error',400);
    }
}

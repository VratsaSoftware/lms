/* sow first video */
var firstLectionVideos = JSON.parse($('#firstLectionVideos').val());
showVideo(0, $('#firstLectionId').val(), firstLectionVideos[0])

/* show lection video */
$('.nav-lection-green-btn').click(function () {
    var lection = JSON.parse($(this).attr('data-lections'));
    var videos = JSON.parse($(this).attr('data-videos'));

    $('.videos').empty()

    if (videos.length) {
        videoIframeAppend(lection.id, videos[0])

        $('#lection-video-nav-' + lection.id).empty();
        for (i = 0; i < videos.length; i++) {
            $('#lection-video-nav-' + lection.id).append(`
                <button id="video-nav-btn-${ lection.id }-${ i }" onclick="showVideo(${ i }, ${ lection.id }, '${ videos[i] }')" class="video-nav"
                style="border: none; width: 90px; ${ i == 0 ? 'color:#69b501' : '' }">Видео ${ i + 1 }</button>
            `);
        }
    }
})

/* show video */
function showVideo(video, lectionId, videoUrl) {
    $('.videos').empty();

    videoIframeAppend(lectionId, videoUrl);

    $(".video-nav").css('color', 'black');
    $('#video-nav-btn-' + lectionId + '-' + video).css('color', '#69b501');
}

/* append video */
function videoIframeAppend(lectionId, videoUrl) {
    $('#lection-video-' + lectionId).append(`
        <iframe id="video-0" class="video-list" width="762" height="375" src="${ videoUrl }"
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
        picture-in-picture" allowfullscreen style="border-radius: 45px;"></iframe>
    `);
}

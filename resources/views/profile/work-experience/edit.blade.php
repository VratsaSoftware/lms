<div class="modal fade" id="editWorkExperienceModal" tabindex="-1" aria-labelledby="editWorkExperienceModal"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Работен опит
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="{{ asset('/user/update/work/experience') }}" method="post">
                    @csrf
                    <input type="hidden" name="work_id" id="work-id">
                    <div class="mb-3">
                        <label for="work-company" class="form-label">Компания/Фирма</label>
                        <input name="work_company" type="text" class="form-control" id="work-company" placeholder="Компания/Фирма" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">От</span>
                        <input type="text" id="y_from" class="form-control date-input" name="y_from" placeholder="Дата" autocomplete="off" required>
                        <span class="input-group-text">До</span>
                        <input type="text" id="y_to" name="y_to" class="form-control date-input" autocomplete="off" placeholder="Дата">
                    </div>
                    <div class="mb-3">
                        <label for="work-position" class="form-label">Длъжност</label>
                        <input name="work_position" id="work-position" type="text" class="form-control" placeholder="Длъжност" required>
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>

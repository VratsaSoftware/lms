<div class="modal fade" id="createWorkExperienceModal" tabindex="-1" aria-labelledby="createWorkExperienceModal"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Работен опит
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="{{ asset('/user/create/work/experience') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="workCompany" class="form-label">Компания/Фирма</label>
                        <input name="work_company" type="text" class="form-control" id="workCompany" placeholder="Компания/Фирма" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">От</span>
                        <input type="text" class="form-control date-input" name="y_from" placeholder="Дата" autocomplete="off" required>
                        <span class="input-group-text">До</span>
                        <input type="text" name="y_to" class="form-control date-input" autocomplete="off" placeholder="Дата">
                    </div>
                    <div class="mb-3">
                        <label for="workPosition" class="form-label">Длъжност</label>
                        <input name="work_position" type="text" class="form-control" id="workPosition" placeholder="Длъжност" required>
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>

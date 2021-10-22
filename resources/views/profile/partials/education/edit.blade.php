<div class="modal fade" id="educationModal-edit" tabindex="-1" aria-labelledby="educationModal-edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Образование
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="{{ asset('/user/update/education') }}" method="POST">
                    @csrf
                    <input name="edu_id" type="hidden" id="education-id">
                    <div class="mb-3">
                        <label for="edu-name" class="form-label">Учебно заведение</label>
                        <input name="institution_name" type="text" class="form-control" id="edu-name"
                        placeholder="Учебно заведение" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">От</span>
                        <input type="number" id="edu-y_from" class="form-control" name="y_from" placeholder="Година" min="1900" max="2099" required>
                        <span class="input-group-text">До</span>
                        <input type="number" id="edu-y_to" name="y_to" class="form-control" min="1900" max="2099" placeholder="Година">
                    </div>
                    <div class="mb-3">
                        <label for="schoolSpecialty" class="form-label">Специалност</label>
                        <input name="specialty" id="specialty" type="text" class="form-control" id="schoolSpecialty" placeholder="Специалност">
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>

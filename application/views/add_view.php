<div class="add-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Добавление задачи</h4>
            </div>
            <div class="modal-body">
                <h3>Данные задачи</h3>
                <form method="post" action="/add">
                    <div class="form-group">
                        <label class="control-label" for="name">Имя:</label>
                        <input type="text" required class="form-control" id="name" name="name">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email:</label>
                        <input type="email" required class="form-control" id="email" name="email">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Текст:</label>
                        <input type="text" required class="form-control" id="description" name="description">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="image">Картинка:</label>
                        <input type="text" required class="form-control" id="image" name="image">
                        <div class="help-block"></div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
                        <button class="btn btn-primary" type="submit">Сохранить изменения</button>
                    </div>

                </form>
            </div>



        </div>
    </div>
</div>
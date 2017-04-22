<div class="container">
    <a class="btn btn-lg btn-success" id="add" href="/add">Добавить</a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>имя</th>
                <th>е-mail</th>
                <th>текст задачи</th>
                <th>картинка</th>
                <th>статус</th>
                <th>действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $item) : ?>
            <tr>
                <td class="name">
                    <?= $item->name; ?>
                </td>
                <td class="email">
                    <?= $item->email; ?>
                </td>
                <td class="description">
                    <?= $item->description; ?>
                </td>
                <td class="image">
                    <?= $item->image; ?>
                </td>
                <td class="image">
                    <?= $item->status; ?>
                </td>
                <td>
                    <a href="/edit/<?= $item->id; ?>"><span class="glyphicon glyphicon-pencil edit"></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
                    <h4 class="modal-title" id="myModalLabelDelete">Удаление клиента</h4>
                </div>
                <div class="modal-body">
                    <span> Вы действительно хотите удалить этого клиента?</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Отмена</button>
                    <button class="btn btn-primary" id="del" type="button" (click)="delete()">Ок</button></div>
            </div>
        </div>
    </div>



</div>





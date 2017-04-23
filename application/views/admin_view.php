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






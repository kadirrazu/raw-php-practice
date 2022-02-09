
<div class="container">
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
                <tr>
                    <td>
                        Term:
                    </td>
                    <td><?= $data->term ?></td>
                </tr>
                <tr>
                    <td>Defination:</td>
                    <td><?= $data->defination ?></td>
                </tr>
        </table>
    </div>
</div>
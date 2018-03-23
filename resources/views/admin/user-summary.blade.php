<h4>Profile details:</h4>

    <div id="member" class="tab-pane fade in active">

        <table border="0" class="table table-striped table-bordered">
            <tr>
                <td>Name:</td>
                <td>{!!$name!!}</td>
            </tr>
            <tr>
                <td>Email: &nbsp;</td>
                <td>{!!$email!!}</td>
            </tr>
            <tr>
                <td>ID: &nbsp;</td>
                <td>{!!$id_number!!}</td>
            </tr>
            <tr>
                <td>Date Updated: &nbsp;</td>
                <td>{!!$updated_at!!}</td>
            </tr>
            <tr>
                <td>Date Created: &nbsp;</td>
                <td>{!!$created_at!!}</td>
            </tr>
        </table>
    </div>

<div>
    <a target="_blank" href="{{ route('admin.users.edit', $id) }}" class="btn btn-default">Edit member</a>
</div>

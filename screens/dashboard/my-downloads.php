<div class="">

    <table class="table table-hover h-100">
        <thead>
        <tr>
            <th>ID</th>
            <th>Subject Code</th>
            <th>Question No</th>
            <th>Question Year</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr id="d1">
            <td>1</td>
            <td id="f1">BCS-012</td>
            <td id="l1">2 A</td>
            <td id="m1">2018</td>
            <td><button type="button" data-toggle="modal" data-target="#view" data-uid="1" class="update btn btn-warning btn-sm" href="<?php echo \utils\Url::generateLink('read-note');?>">
                    <i class="fa fa-eye"></i></button></td>
            <td><button type="button" data-toggle="modal" data-target="#delete" data-uid="1" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
        </tr>

        </tbody>
    </table>

</div>
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Update Data</h4>
            </div>
            <div class="modal-body">
                <input id="fn" type="text" class="form-control mb-3" name="fname" placeholder="Subject Code">
                <input id="ln" type="text" class="form-control mb-3" name="fname" placeholder="Question No">
                <input id="mn" type="text" class="form-control mb-3" name="fname" placeholder="Question Year">
            </div>
            <div class="modal-footer">
                <button type="button" id="up" class="btn my-primary-btn text-white" data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-default my-secondary-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Data</h4>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure you want to delete this data?</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="del" class="btn my-secondary-btn" data-dismiss="modal">Delete</button>
                                <button type="button" class="btn my-primary-btn text-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

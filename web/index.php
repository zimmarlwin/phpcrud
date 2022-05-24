<?php include("../app/_parts/header.php");?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span><a href="addform.php" class="btn btn-danger">新規情報追加</a></span>
                    <span><a href="#" class="btn btn-primary">全削除</a></span>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                            class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sr</th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example2" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        タイトル</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        情報</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="2"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        運動</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($datas as $data): ?>
                                                <tr>
                                                    <td>
                                                        <form action="?action=checkbox_action" method="POST">
                                                            <input type="checkbox"
                                                                <?= $data->is_done ? 'checked' : ''; ?>>
                                                            <input type="hidden" name="id" value="<?= h($data->id);?>">
                                                            <input type="hidden" value="<?= h($_SESSION['token']);?>"
                                                                name="token">
                                                        </form>
                                                    </td>
                                                    <td class="<?= $data->is_done ? 'done' : ''; ?>">1</td>
                                                    <td class="<?= $data->is_done ? 'done' : ''; ?>">
                                                        <?= h($data->title); ?></td>
                                                    <td class="<?= $data->is_done ? 'done' : ''; ?>">
                                                        <?= h($data->description); ?></td>
                                                    <td class="d-flex">
                                                        <form action="?action=data_delete" method="POST">
                                                            <input type="button" class="delete btn btn-danger mr-2"
                                                                value="削除">
                                                            <input type="hidden" name="id" value="<?= h($data->id);?>">
                                                            <input type="hidden" value="<?= h($_SESSION['token']);?>"
                                                                name="token">
                                                        </form>

                                                        <a href="editform.php?id=<?= h($data->id);?>"><button
                                                                class="btn btn-primary">編集</button></a>

                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("../app/_parts/footer.php");?>
<?php 
include("../app/_parts/header.php");
use MyApp\Utils;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <span><a href="addform.php" class="btn btn-primary mr-2">新規情報追加</a></span>
                    <span>
                        <input type="button" class="purge btn btn-danger mr-2" value="削除">
                    </span>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
                        <li class="breadcrumb-item active">掲示板</li>
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
                                                <?php foreach($datas as $data):?>

                                                <tr class="remove">
                                                    <td data-id="<?= Utils::h($data->id);?>">
                                                        <input class="check" type="checkbox"
                                                            <?= $data->is_done ? 'checked' : ''; ?>>
                                                    </td>
                                                    <td>
                                                        <?= Utils::h($data->title); ?>
                                                    </td>
                                                    <td>
                                                        <?= Utils::h($data->description); ?></td>
                                                    <td class="d-flex" data-id="<?= Utils::h($data->id);?>">
                                                        <input type="button" class="delete btn btn-danger mr-2"
                                                            value="削除">

                                                        <a href="editform.php?id=<?= Utils::h($data->id);?>"><button
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
<?php include("../app/_parts/footer.php");?>]
<?php 
    include("../app/_parts/header.php");
    use MyApp\Utils;
?>

<?php
    $id = filter_input(INPUT_GET, 'id');
    $stmt = $pdo->query("SELECT * FROM datas WHERE id = $id");
    $getdata = $stmt->fetchAll();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span><a href="http://localhost/php_crud/web/" class="btn btn-danger">全情報</a></span>

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
                                        <form action="?action=data_edit" method="POST">
                                            <input type="hidden" value="<?= Utils::h($id);?>" name="id">
                                            <input type="hidden" value="<?= Utils::h($_SESSION['token']);?>"
                                                name="token">
                                            <?php foreach ($getdata as $data) : ?>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>タイトル</label>
                                                    <input type="text" class="form-control" placeholder="Enter Title"
                                                        name="title" value="<?= Utils::h($data->title); ?>">
                                                </div>
                                                <div class=" form-group">
                                                    <label for="exampleInputPassword1">情報</label>
                                                    <textarea name="description" id="" cols="30" rows="10"
                                                        class="form-control"
                                                        placeholder="Enter Description"><?= Utils::h($data->description); ?></textarea>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">押す</button>
                                                <input type="hidden" value="<?= Utils::h($id);?>" name="id">

                                            </div>
                                        </form>
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
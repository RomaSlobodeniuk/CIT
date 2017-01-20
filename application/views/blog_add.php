<div class="container">
    <div class="jumbotron">
        <h1><?= $data[0]; ?></h1>
        <a href="../../blog">Back to blog</a>
    </div>
</div>
<style>
    label {
        display: block;
    }
</style>
<!--<pre>-->
<!--    --><?php //print_r($data);?>
<!--</pre>-->
<form class="form-horizontal" method="post" action="http://localhost/04_test_files/CIT/blog/save">
    <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title:</label>
        <div class="col-sm-10">
            <input type="text" name="title" id="title" value="<?= $data[1]->title; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="author">Author:</label>
        <div class="col-sm-10">
            <input type="text" name="author" class="form-control" id="author" value="<?= $data[1]->author; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date">Date:</label>
        <div class="col-sm-10">
            <input type="text" name="date" class="form-control" id="date" value="<?= $data[1]->date; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date">Text:</label>
        <div class="col-sm-10">
            <textarea type="text" name="text" class="form-control" id="text"><?= $data[1]->text; ?></textarea>
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $data[1]->id; ?>">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="submit" class="btn btn-default" value="Send">
        </div>
    </div>
</form>
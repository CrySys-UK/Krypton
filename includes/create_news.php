<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Create a News Article</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="articletitle">Article Title</label>
                <input type="text" class="form-control" id="articletitle">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <textarea name="editor1"></textarea>
            <script>
                CKEDITOR.replace('editor1');

            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a href="#" class="btn btn-primary btn-default"><span class="glyphicon glyphicon-ok"></span> Submit</a>
        </div>
    </div>
</div>

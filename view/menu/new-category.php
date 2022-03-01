<?php require_once __DIR__.'/../header.php'; ?>

<form>
  <div class="container">
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" name="categoryList" id="categoryList">
        <?php foreach($categories as $category) : ?>
        <option><?=$category->name?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="genre">Genre</label>
      <select class="form-control" name="genreList" id="genreList">
        <?php foreach($categories as $category) : ?>
        <option><?=$category->name?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</form>

<?php require_once __DIR__.'/../footer.php'; ?>
<script type="text/javascript">

$(document).ready(function () {

    // if user chooses an option from the select box...
    $("#categoryList").change(function () {
        // get selected value from selectbox with id #department_list
        var selectedCategory = $(this).val();
        $.ajax({

            url: "/getGenres.php",
            data: "q=" + selectedCategory,
            dataType: "json",

            // if successful
            success: function (response, textStatus, jqXHR) {
                // no teachers found -> an empty array was returned from the backend
                if (response.teacherNames.length == 0) {
                    $('#result').html("nothing found");
                }
                else {
                    // backend returned an array of names
                    var list = $("#list");

                    // remove items from previous searches from the result list
                    $('#list').empty();

                    // append each teachername to the list and wrap in <li>
                    $.each(response.teacherNames, function (i, val) {
                        list.append($("<li>" + val + "</li>"));
                    });
                }
            }});
    });

    $(document).ajaxError(function (e, xhr, settings, exception) {
        $("#error").html("<div class='alert alert-warning'> Ops, an error occurred.</div>");
    });
});

</script>
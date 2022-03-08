<?php require_once __DIR__.'/../header.php'; ?>

<form method="POST" action="/new-item">
  <div class="container">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" name="categoryList" id="categoryList">
        <option id=""></option>
        <?php foreach($categories as $category) : ?>
        <option id="<?=$category->id?>"><?=$category->name?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="genre">Genre</label>
      <select class="form-control" name="genreList" id="genreList"></select>
      <button class="btn btn-success  float-right mt-2" name="save">Save</button>
    </div>
  </div>
</form>

<?php require_once __DIR__.'/../footer.php'; ?>
<script type="text/javascript">

$(document).ready(function () {

    // if user chooses an option from the select box...
    $("#categoryList").change(function () {
      // get selected value from selectbox with id #department_list
      var selectedCategory = $(this).children(":selected").attr("id");
    
      if (selectedCategory.length != 0){
        $.ajax({

          url: "/getGenres",
          method: "POST",
          data: { data: selectedCategory },
          dataType: "json",

          // if successful
          success: function (response, textStatus, jqXHR) {
            // no teachers found -> an empty array was returned from the backend
            if (response.options.length == 0) {
              $('#result').html("nothing found");
            }
            else {
              // backend returned an array of names
              var list = $("#genreList");

              // remove items from previous searches from the result list
              $('#genreList').empty();
              // append each teachername to the list and wrap in <li>
              $.each(response.options, function (i, val) {
                  list.append("<option value='"+response.id[i]+"'>"+response.options[i]+"</option>");
              });
            }
        }});
      } else {
        $('#genreList').empty();
      }
    });
    
    $(document).ajaxError(function (e, xhr, settings, exception) {
        $("#error").html("<div class='alert alert-warning'> Ops, an error occurred.</div>");
    });
});

</script>
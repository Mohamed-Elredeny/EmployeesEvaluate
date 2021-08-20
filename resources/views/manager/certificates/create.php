<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
      integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
<?php include_once('functions.php') ?>

<style>
    .redo_header{
        padding:20px;
        position:relative;
        left:400px
    }
</style>
<div class="redo_header">
    <form class='col-sm-6' method="post" action="#">
        <center>
            <h2>Add New Certificate</h2>
        </center>
        <div class='form-group'>
            <label for='exampleInputEmail1'>Number</label>
            <input type='number' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter number  ' name='number' required>
        </div>
        <div class='form-group'>
            <label for='exampleInputEmail1'>Arabic Name </label>
            <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter Arabic Name ' name="name_ar" required>
        </div>
        <div class='form-group'>
            <label for='exampleInputEmail1'>English Name </label>
            <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter English Name ' name='name_en' required>
        </div>

        <div class='form-group'>
            <label for='exampleInputEmail1'>Program Arabic Name </label>
            <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter Arabic Name ' name='program_ar' required>
        </div>
        <div class='form-group'>
            <label for='exampleInputEmail1'>Program English Name </label>
            <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter English Name ' name='program_en' required>
        </div>


        <div class='form-group'>
            <label for='exampleInputEmail1'>Date </label>
            <input type='date' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                   placeholder='Enter English Name ' name='date' required>
        </div>

        <button type="submit" class="btn btn-primary" name="add">Add</button>
    </form>

</div>

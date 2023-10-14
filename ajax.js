/**
 * Created by Rudro on 04-Apr-17.
 */
 //for adding employree
jQuery(document).ready(function(){
	//for Login

     $('#loginForm').on('submit',function(e){

        var fd = new FormData(this);
        
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#loginMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });

    $('#signupForm').on('submit',function(e){

        var fd = new FormData(this);
        
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#signupMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });



    //add company 
    $('#companyForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#companyMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
       //update company 
      $('#updatecompanyForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#updatecompanyMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });


    $('#employeeForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#messageemployee').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //update employee
      $('#updateemployeeForm').on('submit',function(e){

        var fd = new FormData(this);
        
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#updateemployeeMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
    //for password change

     $('#updatepassword').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#updatepasswordmessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //income transaction 
     $('#incomeForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#incomeMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //expense transaction 
     $('#expenseForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#expenseMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //mile report 
     $('#mileForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#mileMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //mile report
      //mile report 
     $('#milereportForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#milereportMessage').html(data);
                     mileageTable.ajax.reload();
                }
            });

        e.preventDefault();
        return false;


    });


     //transaction report 
     $('#transactionForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#transactionMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });
     //contract report 
    $('#contractForm').on('submit',function(e){

        var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert("success");
                     $('#contractMessage').html(data);
                }
            });

        e.preventDefault();
        return false;


    });

    //contract edit
    $('#contractedit').on('submit',function(e){
       var fd = new FormData(this);
        //var submit=$('#submitIndividual');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: fd,
                contentType:false,
                cache: false,
                processData: false,
                success: function (data) {
                     $('#contracteditMessage').html(data);
                }
            });

        e.preventDefault();
        return false;

    });
    //for foget pass
    $('#forgetPassForm').on('submit',function(e){

        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: "process.php",
            data: fd,
            contentType:false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#forgetPassMessage').html(data);
            }
  
        });

        e.preventDefault();
        return false;


    });
   


});
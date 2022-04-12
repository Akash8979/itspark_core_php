$(document).ready(function () {
     var URL = window.location.origin;
     $("body").on("click", ".edit", function () {
          $(this).closest("tr").html(`
          <td><input value="${$(this).closest("tr").find("td:nth-child(1)").text()}" /></td>
          <td><input value="${$(this).closest("tr").find("td:nth-child(2)").text()}" /></td>
          <td class="action-btn wspace-no text-center">
                              <button class="btn btn-primary update mx-2">update</button>
                              <button class="btn btn-danger delete">Delete</button>
                         </td>
          `)


     });

     $("body").on("click", ".update", function () {

          var tr = $(this).closest("tr");
          var form = {
               "name": '',
               "email": '',
               "id": '',
               "type":''

          };
          if ($(this).closest("tr").find("td:nth-child(1) input").val().trim() == "") {
               $("#error").text("name can nnot be empty");
          } else if ($(this).closest("tr").find("td:nth-child(2) input").val().trim() == "") {
               $("#error").text("Email can nnot be empty");
          } else {
               form.name = $(this).closest("tr").find("td:nth-child(1) input").val().trim();
               form.email = $(this).closest("tr").find("td:nth-child(2) input").val().trim();
               form.id = $(this).closest("tr").attr('userId');
               form.type = 1;

               $.ajax({
                    url: URL + "/extra.php",
                    method: "post",
                    data: {
                         formData: form
                    },
                    success: function (data) {
                        
                         if (data == 1) {
                             
                              tr.html(`
                          <td>${form.name}</td>
                          <td>${form.email}</td>
                          <td class="action-btn wspace-no text-center">
                                              <button class="btn btn-primary edit mx-2">Edit</button>
                                              <button class="btn btn-danger delete">Delete</button>
                                         </td>
                          `)
                         }

                    },
               })
          }
     });


     $("body").on("click", ".delete", function () {
          var tr =  $(this).closest("tr");
          var form = {
               "id": '',
               "type":''

          };
          form.id = $(this).closest("tr").attr('userId');
          form.type = 2;
                $.ajax({
                     url: URL + "/extra.php",
                     method: "post",
                     data: {
                         formData: form
                     },
                     success: function (data) {
                          if (data == 1) {
                              tr.remove();  
                          }
                        
                     },
                })
           
      });

     $("body").on("click", "#toAddNewUser", function () {
          $("#userTable").prepend(`<tr>
          <td><input value="" /></td>
          <td><input value="" /></td>
          <td class="action-btn wspace-no text-center">
                              <button class="btn btn-primary add mx-2">Add</button>
                              <button class="btn btn-danger Remove">Remove</button>
                         </td></tr>
          `)
           
      });
     $("body").on("click", ".Remove", function () {
          $(this).closest("tr").remove();
           
      });

      $("body").on("click", ".add", function () {

          var tr = $(this).closest("tr");
          var form = {
               "name": '',
               "email": '',
               "id": '',
               "type":''

          };
          if ($(this).closest("tr").find("td:nth-child(1) input").val().trim() == "") {
               $("#error").text("name can nnot be empty");
          } else if ($(this).closest("tr").find("td:nth-child(2) input").val().trim() == "") {
               $("#error").text("Email can nnot be empty");
          } else {
               form.name = $(this).closest("tr").find("td:nth-child(1) input").val().trim();
               form.email = $(this).closest("tr").find("td:nth-child(2) input").val().trim();
               form.id = $(this).closest("tr").attr('userId');
               form.type = 3;

               $.ajax({
                    url: URL + "/extra.php",
                    method: "post",
                    data: {
                         formData: form
                    },
                    success: function (data) {
                        
                         if (data == 1) {
                             
                              tr.html(`
                          <td>${form.name}</td>
                          <td>${form.email}</td>
                          <td class="action-btn wspace-no text-center">
                                              <button class="btn btn-primary edit mx-2">Edit</button>
                                              <button class="btn btn-danger delete">Delete</button>
                                         </td>
                          `)
                         }

                    },
               })
          }
     });


});
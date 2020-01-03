   $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
       });
   });

   $(document).ready(function(){
    $("#add_member").click(function(){
      $(".member_form").show();
    });
});

   $(document).ready(function(){
    $("#groups").on('click',function(){
        $(".group_form").show();
        
    });

  });


  $(document).ready(function(){
   $("#default").click(function(){
     $(".member_form").remove();
   });
});


 $(document).ready(function(){
  $("#remove_group").click(function(){
    $(".group_form").remove();
  });
});


    // ajax form submission
    $("#groupForm").on("submit",function(e){

      e.preventDefault();

      $.ajax({
        type:'post',
        url:'create_group.php',
        data:$("#groupForm").serialize(),
        success:function(){
          $("#responsegroup").html("Group created successfully");
          $('#group_name').val('');
          $('#exampleFormControlTextarea1').val('');
        },

        error:function(){
          $("#responsegroup").html("Error in creating group");
        }
       
      });
    });




    // end of ajax form submission




    // logic to searching for a member
    $("#searchmember").click(function(){

      let value_to_search=$("#searchmember").val();//this fetches the search data from textbox

      $.ajax({
        type:'post',
        url:'search_member.php',
        data:{'search_value':value_to_search},//this bundles the search data
        success:function(data)//data is the response from the php script received as json
        {
          let thedata=JSON.parse(data);//assigning the response and converting it into js array.
          let len=thedata.length;//this gets the length of the data received conveted
          let value_to_show="";//this is the final response to be displayed in the table body

           //because our array was multidemensional, we need to run 2 loops to get all values
          for (var i = 0; i <= len-1; i++)//this checks the first level of the array upwards that is from index 0
          {
            if (value_to_show="") {value_to_show=value_to_show+"<tr>"}//if we are on the first value then we start creating a row
            let len2=thedata[i].length;
            for (var j = 0; j <= len2-1; j++)//this loop checks the values in the current level of the array 
            {
            value_to_show=value_to_show+"<td>"+thedata[i][j]+"</td>";//assigns the values in the array to individual table data
            
            }
          value_to_show=value_to_show+"</tr>";//closes the row when an array level is done
          }
          // console.log("form submitted");
          $("#searchdata").html(value_to_show);//assign final result to this div on the page
          $("#display_member").show("");//make the hidden table visible
        },

        error:function(){
          console.log("failed");
        }
       
      });
    });
    // end of ajax form submission


    $(document).ready(function(){
      $("#view_group").click(function(){
          $(".group_table").show();
      });
    });

    $(document).ready(function(){
      $(".btn").click(function(){
          $(".group_table").remove();
      });
    });

    // calendar ajax form submission
    $("#calendar").on("submit",function(e){

      e.preventDefault();

      $.ajax({
        type:'post',
        url:'create_calendar.php',
        data:$("#calendar").serialize(),
        success:function(){
          $("#response").html("event created successfully");
          $('#inputName').val('');
          $('#inputTheme').val('');
          $('#leader').val('');
          $('#schedule').val('');
          $('#exampleFormControlTextarea1').val('');
        },

        error:function(){
          $("#responsegroup").html("Error in creating group");
        }
       
      });
    });

    


    


    

    
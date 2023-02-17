function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("dataTable");
  switching = true;

  //Set the sorting direction to ascending:
  dir = "asc"; 

  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;

      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
              
          //start by saying there should be no switching:
          shouldSwitch = false;

          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];

          /*check if the two rows should switch place,
          based on the direction, asc or desc:*/
          if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  //if so, mark as a switch and break the loop:
                  shouldSwitch= true;
                  break;
              }
          } 
          else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                  //if so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
              }
          }
      }
      if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          //Each time a switch is done, increase this count by 1:
          switchcount ++;      
      } 
      else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
          if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
          }
      }
  }
}

function getNumber(string) {
  const num = (/^\d+$/.test(string) && string.charAt(0) !== '0') ? Number(string) : false;
  return num;
}        

function search() {
  var input, filter, table, tr, td, i, txtValue;

  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");  
  
  if(getNumber(filter)){
      for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
              } 
              else {
                  tr[i].style.display = "none";
              }
          }                    
      }
  }
  
  else{
      for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
              } 
              else {
                  tr[i].style.display = "none";
              }
          }                        
      }
  }
}

function updateQuizRows() {
  var numRows = document.getElementById("questions").value;
    var table = "<table border='1'>";
    table +="<th>Branch</th>  <th>Book</th> <th>Page</th> <th>Question</th> <th>Point</th>  <th>Note +</th>";
    table +="</tr></thead><tbody>";
    for (var i =0; i < numRows; i++) {
      table += "<tr><td><select id= 'branchList' class='branchList' title='Branch' onchange='updateBookList()' style=' width: 100%; font-size: 16px; padding: 5px 0px 5px 5px; border: 1px solid #ddd; margin-bottom: 10px; margin-left: 2%; border-radius : 15px'><option value=''>Branch</option>" 
            + "</td><td><select id= 'bookList' class='bookList' title='Book' style=' width: 100%; font-size: 16px; padding: 5px 0px 5px 5px; border: 1px solid #ddd; margin-bottom: 10px; margin-left: 2%; border-radius : 15px'><option value=''>Book</option>"
            + "</td><td>Column 3, Row " + (i+1)
            + "</td><td>Column 4, Row " + (i+1)
            + "</td><td>Column 5, Row " + (i+1) 
            + "</td><td><input type='text' id='quiz_notes' placeholder='Any notes..' title='Quiz Number' style=' width: 100%;font-size: 16px; padding-left: 15px; border: 1px solid #ddd; margin-top: -5px; margin-bottom: 12px;  margin-left: 5px; border-radius: 20px'>" 
            + "</td></tr>";
    }
    table += "</tbody></table>";
    document.getElementById("quiz_questions").innerHTML = table;
}

function updateBranchList() {
  var firstList = document.getElementById("yearList");
  var secondList = document.getElementsByClassName("branchList");
  secondList.innerHTML = "";

  var option0 = document.createElement("option");
  option0.value = " ";
  option0.text = "Branch";
  secondList.appendChild(option0);

  if (firstList.value === "3rd") {
    var option1 = document.createElement("option");
    option1.value = "Algebra";
    option1.text = "Algebra";
    secondList.appendChild(option1);

    var option2 = document.createElement("option");
    option2.value = "Calculus";
    option2.text = "Calculus";
    secondList.appendChild(option2);

    var option3 = document.createElement("option");
    option3.value = "Statics";
    option3.text = "Statics";
    secondList.appendChild(option3);

    var option4 = document.createElement("option");
    option4.value = "Mechanics";
    option4.text = "Mechanics";
    secondList.appendChild(option4);

  } 
  
  else if (firstList.value === "2nd math") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  } 
  
  else if (firstList.value === "2nd mech") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  } 
  
  else if (firstList.value === "1st") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  }
}

function updateBookList() {
  var firstList = document.getElementById("branchList");
  var secondList = document.getElementById("bookList");
  secondList.innerHTML = "";

  var option0 = document.createElement("option");
  option0.value = " ";
  option0.text = "Book";
  secondList.appendChild(option0);

  if (firstList.value === "Algebra") {
    var option1 = document.createElement("option");
    option1.value = "Excercise";
    option1.text = "Excercise";
    secondList.appendChild(option1);

    var option2 = document.createElement("option");
    option2.value = "Examination";
    option2.text = "Examination";
    secondList.appendChild(option2);

  } 
  
  else if (firstList.value === "Calculus") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  } 
  
  else if (firstList.value === "Statics") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  } 
  
  else if (firstList.value === "Mechanics") {
    var option1 = document.createElement("option");
    option1.value = "Option 2A";
    option1.text = "Option 2A";
    secondList.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.value = "Option 2B";
    option2.text = "Option 2B";
    secondList.appendChild(option2);

  }
}


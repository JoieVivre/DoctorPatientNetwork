$(document).ready(function()
			{	
				$("#HName").empty();
					
				$("#dbInfo").click(function()
				{
					
					$.post("http://localhost/DPN/hospital/dbInfo.php", function(data){
						console.log(data);
						
						if (data !== "No data"){
							//have to clear original field
							$("#myitems").empty();		
							var addRecord = JSON.parse(data);
							for(var i = 0; i < addRecord.length; i++){
								
								var item = addRecord[i].HospitalName + " " + addRecord[i].HospitalAddress;
								
								item = "<li>" + item + "</li>";
								$("#myitems").append(item);
							}
						}
						else{
								$("#myitemsP").text(data);
						}
					});//post
				});//#dbInfo, click function
				
				$("#dbInfoD").click(function()
				{
					
					$.post("http://localhost/DPN/hospital/dbInfoD.php", function(data){
						console.log(data);
						
						if (data !== "No data"){
							//have to clear original field
							$("#myitems").empty();		
							var addRecord = JSON.parse(data);
							for(var i = 0; i < addRecord.length; i++){
								
								var item = addRecord[i].HospitalName + " " + addRecord[i].HospitalAddress;
								
								item = "<li>" + item + "</li>";
								$("#myitems").append(item);
							}
						}
						else{
								$("#myitemsP").text(data);
						}
					});//post
				});//#dbInfoD, click function
				
				$("#saveH").click(function()
				{
					var HospitalName = $("#HName").val();
					var HospitalAddress = $("#HAddress").val();
					//var patientID = $("#pID").val();
					
					var item = 
					{
						//patientId : patientID,
						//gets passed to php: comes from variable declare above
						hospitalname : HospitalName,
						hospitaladdress : HospitalAddress
					};
					
					$.post("http://localhost/DPN/doctor/serviceD.php", item, function(data)
					{
						console.log(data);
						alert(data);
					});//post
				});//#saveitem, click function			
				
				$("#searchH").click(function(){
					var HospitalName = $("#HNameSEARCH").val();
					
					var item = {
						hospitalname : HospitalName
					};
					
					$.post("http://localhost/DPN/hospital/searchH.php", item, function(data)
					{
						console.log(data);
						
						if (data !== "Item not found: 0 results"){
							//have to clear original field
							$("#searchmyitems").empty();		
							var addRecord = JSON.parse(data);
							for(var i = 0; i < addRecord.length; i++){
								
								var item = addRecord[i].HospitalName + " " + addRecord[i].HospitalAddress;
								
								item = "<li>" + item + "</li>";
								$("#searchmyitems").append(item);
							}
						}
						else{
								$("#searchResults").text(data);
						}
					});//post			
				});//#searchH, click function			
				
				$("#updateH").click(function(){
					var HospitalName = $("#HNameUPDATE").val();
					var HospitalAddress = $("#HAddressUPDATE").val();
					
					var item = {
						hospitalname : HospitalName,
						hospitaladdress : HospitalAddress
					};
					
					$.post("http://localhost/DPN/hospital/updateH.php", item, function(data){
						console.log(data);
					});//post			
				});//#updateH, click function			
			
				$("#deleteH").click(function(){
					var HospitalName = $("#HNameDELETE").val();
					
					var item = {
						hospitalname : HospitalName
					};
					
					$.post("http://localhost/DPN/hospital/deleteHH.php", item, function(data){
						console.log(data);
						alert("Item deleted from the database");
					});//post			
				});//#deleteH, click function			
			
				$("#countH").click(function(){
					var HospitalName = $("#HName").val();
					
					var item = {
						hospitalname : HospitalName
					};
					
					$.post("http://localhost/DPN/hospital/countH.php", item, function(data){
						console.log(data);
						$("#countResults").text(data);
					});//post			
				});//#deleteH, click function			
			
			});//ready function
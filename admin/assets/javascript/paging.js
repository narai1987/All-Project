
function active(id,status)
{ 
   
	document.getElementById("id").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "active";
	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	document.filterForm.submit(); 
	 
}


function activemenu(id,status,menutype)
{  
	document.getElementById("id").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	
	/*document.getElementById("filterForm").action="index.php?control=countrie&view=countrie&task=active&id="+id; */
	document.getElementById("task").value = "menustatus";
	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	document.getElementById("type").value = menutype;
	
	document.filterForm.submit(); 
	 
}

function edit(id)
{
	//alert(id);
	document.getElementById("edit").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "addnew";
	document.getElementById("id").value = id;
	//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
	/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
	document.filterForm.submit(); 
	 
}


function detete(id)
{
	document.getElementById("del").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "delete";
	document.getElementById("id").value = id;

	
	if(confirm('Are you sure you want to delete ?')) {
		document.filterForm.submit(); 
	}
	else
	{
	//alert("No");
	}
}

function state_status(id,status)
{ 

	document.getElementById("id").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
    document.getElementById("task").value = "state_status";
	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	
	document.filterForm.submit(); 
	 
}
function state_edit(id)
{
	//alert(id);
	document.getElementById("edit").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "state_addnew";
	document.getElementById("id").value = id;
	//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
	/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
	document.filterForm.submit(); 
	 
}
function states_delete(id)
{
	document.getElementById("del").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "states_delete";
	document.getElementById("id").value = id;

	
	if(confirm('Are you sure you want to delete ?')) {
		document.filterForm.submit(); 
	}
	else
	{
	//alert("No");
	}
}
function city_status(id,status)
{ 
    
	document.getElementById("id").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
    document.getElementById("task").value = "city_status";
	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	
	document.filterForm.submit(); 
	 
}
function city_edit(id)
{
	//alert(id);
	document.getElementById("edit").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "city_addnew";
	document.getElementById("id").value = id;
	//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
	/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
	document.filterForm.submit(); 
	 
}
function city_delete(id)
{
	document.getElementById("del").value = Number(id);
	document.getElementById("tpages").value = Number(document.getElementById("filter").value);
	document.getElementById("task").value = "city_delete";
	document.getElementById("id").value = id;

	
	if(confirm('Are you sure you want to delete ?')) {
		document.filterForm.submit(); 
	}
	else
	{
	//alert("No");
	}
}

	function relation_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "relation_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function relation_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function relation_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function certificate_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function certificate_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function certificate_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function coupon_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function coupon_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addcoupon";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function shareCoupon(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "shareCoupon";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function coupon_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function emailTemplate_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function emailTemplate_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function emailTemplate_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function equipment_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function equipment_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function equipment_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function food_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function food_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function food_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function foodtype_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "food_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function foodtype_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "food_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function foodtype_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "food_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function beverage_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function beverage_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function beverage_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	function beveragetype_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "beverage_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function beveragetype_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "beverage_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function beveragetype_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "beverage_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function cabin_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function cabin_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function cabin_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function cabin_optionstatus(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "statusoption";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		//alert(id); 
	}
	function cabin_optionedit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnewoption";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function cabin_optiondelete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "deleteoption";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function company_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function company_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function company_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function operator_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function operator_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
		function boat_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
		function boat_gallery(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function boat_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	
	function boatfeature_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boatfeature_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boatfeature_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	
	
	
	function boat_cockpit_feature_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_cockpit_feature_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_cockpit_feature_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_cockpit_feature_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_cockpit_feature_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_cockpit_feature_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function boat_safety_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_safety_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_safety_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_safety_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_safety_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_safety_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function boat_facility_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_facility_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_facility_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_facility_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_facility_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_facility_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	function boat_communication_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_communication_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_communication_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_communication_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_communication_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_communication_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
	
	
	function boat_helm_feature_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_helm_feature_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_helm_feature_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_helm_feature_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_helm_feature_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_helm_feature_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	
	
	function boat_hulldeck_feature_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_hulldeck_feature_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_hulldeck_feature_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_hulldeck_feature_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_hulldeck_feature_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_hulldeck_feature_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	
	
	
	function engine_power_option_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "engine_power_option_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function engine_power_option_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "engine_power_option_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function engine_power_option_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "engine_power_option_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function boat_engineTechnical_feature_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_engineTechnical_feature_status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	function boat_engineTechnical_feature_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_engineTechnical_feature_addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function boat_engineTechnical_feature_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "boat_engineTechnical_feature_delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	function language_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	
	
	function taxonomy_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	
	function currency_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	
	function currency_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	function gatway_status(id,status)
	{ 
		
		document.getElementById("id").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "status";
		document.getElementById("id").value = id;
		document.getElementById("status").value = status;
		
		document.filterForm.submit(); 
		
	}
	
	function gateway_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function gatway_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	////////////////////////mannu///////////////////////////
	function trip_edit(id)
	{
		
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function trip_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function triptype_edit(id)
	{
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnew";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	
	function tripgas_edit(id)
	{
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnewgas";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function tripgas_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "deletegas";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	
	
	function triptank_edit(id)
	{
		document.getElementById("edit").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "addnewtank";
		document.getElementById("id").value = id;
		//document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("filterForm").value);
		/*document.getElementById("searchForm").action="/betcha/index.php/promotion/edit/"+edit;*/
		document.filterForm.submit(); 
		 
	}
	function triptank_delete(id)
	{
		document.getElementById("del").value = Number(id);
		document.getElementById("tpages").value = Number(document.getElementById("filter").value);
		document.getElementById("task").value = "deletetank";
		document.getElementById("id").value = id;
	
		
		if(confirm('Are you sure you want to delete ?')) {
			document.filterForm.submit(); 
		}
		else
		{
		//alert("No");
		}
	}
	////////////////////////mannu///////////////////////////
	
	
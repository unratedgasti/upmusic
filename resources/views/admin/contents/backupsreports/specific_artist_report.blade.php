<style type="text/css">
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
<div align="center">
	<h3>College of Music Library<br>
Preservation of Philippine Music Sources<br> 
"Index to Filipino Musical Works"</h3>
	<h2 style="margin-bottom: 0px; padding-bottom: 0px">Material List for a Specific Artist</h2>
	<h3 style="margin-top: 0px; padding-top: 0px">{{date("m/d/Y")}}</h3>
</div>
<br>
@foreach ($per_artist as $dat)
<h3 style="margin-bottom: 0px; padding-bottom: 0px">ARTIST: {{$dat['name']}}</h3>
<table style="width:100%">
	<tr>
		<th>Container</th>
		<th>Title</th> 
		<th>Material Type</th>
		<th>Material Description</th>
		<th>Date</th>
		<th>Source</th>
	</tr>
	@foreach ($dat['materials'] as $mat)
		<tr>
		<td>{{$mat->container_type_desc}}-{{$mat->material_container_desc}}</td>
		<td>{{$mat->material_title}}</td> 
		<td>{{$mat->material_category_desc}}</td>
		<td>{{$mat->material_desc}}</td>
		<td>{{$mat->material_inclusion_dates}}</td> 
		<td>{{$mat->material_source}}</td>
		</tr>
	@endforeach	
</table>


<br>
@endforeach
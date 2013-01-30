<div class="well span4">
<h2>Build a Query!</h2>
<label for='dataset'>Pick dataset(s)</label>
<select name='dataset' multiple="multiple" onchange="getValues()">
  <option value="Politicians">Politicians</option>
  <option value="Pollutants">Pollutants</option>
  <option value="Organizations">Organizations</option>
  <option value="Pollutants">Pollutants</option>
</select> 
<p>Select...</p>
<label class="checkbox">
	<input type="checkbox" onchange="getValues()"> All
</label>
<label class="checkbox">
	<input type="checkbox" onchange="getValues()"> Ids
</label>
<label class="checkbox">
	<input type="checkbox" onchange="getValues()"> Names
</label>
</div>
<div class="span4">
	<textarea placeholder="Your query's happy place :-)" cols="60" rows="20"></textarea>
</div>
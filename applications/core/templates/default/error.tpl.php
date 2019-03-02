
 <div class="jumbotron">
	<div class="container">
		<h1>{{ App.error_title }}</h1>                  
      <h3 class="font-bold">{{ App.error_subtitle }}</h3>

		{% if App.error_content is defined and App.error_content != '' %}
			<div class="error-desc">
				{{ App.error_content }}
				
			</div>
			<div class="text-center">{{ App.error_returnbutton }}</div>						
		{% endif %}	
   </div>
</div> 
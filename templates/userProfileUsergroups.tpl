<section class="section">
	<h2 class="sectionTitle">{lang}wcf.user.profile.usergroups{/lang}</h2>

	<ul class="nativeList">
		{foreach from=$groups item=group}
			<li>{lang}{$group->groupName}{/lang}</li>
		{/foreach}
	</ul>
</section>

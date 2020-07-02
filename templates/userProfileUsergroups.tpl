<section class="section">
	<h2 class="sectionTitle">{lang}wcf.user.profile.usergroups{/lang}</h2>
	
	<ul class="nativeList">
		{foreach from=$groups item=group}
			<li>{lang}{$group->groupName}{/lang}</li>
		{/foreach}
	</ul>
</section>

{if !'PROFILE_USERGROUPS_COPYRIGHT'|defined}
	<div style="text-align:right;">
		<div class="copyright marginTop">{lang}wcf.user.profile.usergroups.copyright{/lang}</div>
	</div>
{/if}

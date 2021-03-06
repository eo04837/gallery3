<?php defined("SYSPATH") or die("No direct script access.") ?>
<h4>
  <?= p::clean($group->name) ?>
  <? if (!$group->special): ?>
  <a href="<?= url::site("admin/users/delete_group_form/$group->id") ?>"
    title="<?= t("Delete the %name group", array("name" => p::clean($group->name))) ?>"
    class="gDialogLink gButtonLink ui-state-default ui-corner-all">
    <span class="ui-icon ui-icon-trash"><?= t("delete") ?></span></a>
  <? else: ?>
  <a title="<?= t("This default group cannot be deleted") ?>"
     class="gDialogLink gButtonLink ui-state-disabled ui-corner-all ui-icon-left">
    <span class="ui-icon ui-icon-trash"><?= t("delete") ?></span></a>
  <? endif ?>
</h4>

<? if ($group->users->count() > 0): ?>
<ul>
  <? foreach ($group->users as $i => $user): ?>
  <li class="gUser">
    <?= p::clean($user->name) ?>
    <? if (!$group->special): ?>
    <a href="javascript:remove_user(<?= $user->id ?>, <?= $group->id ?>)"
       class="gButtonLink ui-state-default ui-corner-all ui-icon-left"
       title="<?= t("Remove %user from %group group",
              array("user" => p::clean($user->name), "group" => p::clean($group->name))) ?>">
      <span class="ui-icon ui-icon-closethick"><?= t("remove") ?></span>
    </a>
    <? endif ?>
  </li>
  <? endforeach ?>
</ul>
<? else: ?>
<div>
  <p>
    <?= t("Drag &amp; drop users from the User Admin above into this group box to add group members.") ?>
  </p>
</div>
<? endif ?>

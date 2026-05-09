<h2>Notebook CRUD</h2>

<p>Create, read, update and delete notebook records from the selected Notebook database.</p>

<?php if(isset($crudMessage)) echo $crudMessage; ?>

<form class="searchbar" method="get" action="index.php">
<input type="hidden" name="crud" value="">

<div>
    <label>Search manufacturer or type</label>
    <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>">
</div>

<button class="btn" type="submit">Search</button>

<a class="btn secondary" href="index.php?crud&action=create">Add notebook</a>
</form>

<?php if($showForm) { ?>

<form method="post" action="index.php?crud">
<input type="hidden" name="id" value="<?= htmlspecialchars($item['id'] ?? '') ?>">

<div class="grid">

<div><label>Manufacturer</label><input name="manufacturer" value="<?= htmlspecialchars($item['manufacturer'] ?? '') ?>" required></div>

<div><label>Type</label><input name="type" value="<?= htmlspecialchars($item['type'] ?? '') ?>" required></div>

<div><label>Display</label><input name="display" value="<?= htmlspecialchars($item['display'] ?? '') ?>" required></div>

<div><label>Memory MiB</label><input type="number" name="memory" value="<?= htmlspecialchars($item['memory'] ?? '') ?>" required></div>

<div><label>Hard disk GB</label><input type="number" name="harddisk" value="<?= htmlspecialchars($item['harddisk'] ?? '') ?>" required></div>

<div><label>Video controller</label><input name="videocontroller" value="<?= htmlspecialchars($item['videocontroller'] ?? '') ?>" required></div>

<div><label>Price</label><input type="number" name="price" value="<?= htmlspecialchars($item['price'] ?? '') ?>" required></div>

<div>
<label>Processor</label>
<select name="processorid">
<?php foreach($processors as $p) { ?>
<option value="<?= $p['id'] ?>" <?= (($item['processorid'] ?? '')==$p['id'])?'selected':'' ?>>
<?= htmlspecialchars($p['manufacturer'].' '.$p['type']) ?>
</option>
<?php } ?>
</select>
</div>

<div>
<label>Operating system</label>
<select name="opsystemid">
<?php foreach($opsystems as $o) { ?>
<option value="<?= $o['id'] ?>" <?= (($item['opsystemid'] ?? '')==$o['id'])?'selected':'' ?>>
<?= htmlspecialchars($o['osname']) ?>
</option>
<?php } ?>
</select>
</div>

<div><label>Pieces</label><input type="number" name="pieces" value="<?= htmlspecialchars($item['pieces'] ?? '0') ?>" required></div>

</div>

<button class="btn" type="submit" name="save_notebook">Save notebook</button>
</form>

<?php } ?>

<table>
<tr>
<th>ID</th>
<th>Manufacturer</th>
<th>Type</th>
<th>Specs</th>
<th>Processor</th>
<th>OS</th>
<th>Price</th>
<th>Stock</th>
<th>Actions</th>
</tr>

<?php foreach($notebooks as $n) { ?>
<tr>
<td><?= $n['id'] ?></td>
<td><?= htmlspecialchars($n['manufacturer']) ?></td>
<td><?= htmlspecialchars($n['type']) ?></td>
<td><?= htmlspecialchars($n['display']) ?>”, <?= $n['memory'] ?> MiB, <?= $n['harddisk'] ?> GB<br><?= htmlspecialchars($n['videocontroller']) ?></td>
<td><?= htmlspecialchars($n['processor_manufacturer'].' '.$n['processor_type']) ?></td>
<td><?= htmlspecialchars($n['osname']) ?></td>
<td>£<?= number_format($n['price']) ?></td>
<td><?= $n['pieces'] ?></td>

<td class="actions">
<a href="index.php?crud&action=edit&id=<?= $n['id'] ?>">Edit</a>
<a onclick="return confirm('Delete this notebook?')" href="index.php?crud&action=delete&id=<?= $n['id'] ?>">Delete</a>
</td>

</tr>
<?php } ?>
</table>
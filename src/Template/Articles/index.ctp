<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>

<h1>Articles</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($articles as $article): ?>

    <tr>
        <td><?= $article->id ?></td>
        <td>
    		<!-- 
    			$this->Html is a cakePHP helper that creates html templates
        		the link() take a title, a url and an array of options as paramethers 
    		-->
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postlink(
                    'Delete', 
                    ['action' => 'delete', $article->slug ],
                    ['confirm' => 'Are you sure?']) 
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
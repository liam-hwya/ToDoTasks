
    <?php require 'partials/header.php'; ?>


    

    <div class="task-list-container">

    <h1>Tasks</h1>
    
        <ul class="task-list">

            <?php foreach ($tasks as $task): ?>

                <?php if ($task->completed): ?> 
                    
                    <li>
                        
                        <strike><?= $task->description?></strike>
                    
                    </li>

                <?php else: ?> 
                    
                    <li>
                        
                        <?= $task->description?>

                        <form action="tasks/update" method="post" style="display: inline;">

                            <input type="hidden" name="id" value="<?= $task->id?>">
                            <button type="submit" class="btn complete-btn">Complete</button>

                        </form>
                
                    </li>

                <?php endif; ?>

            <?php endforeach; ?>
        
        </ul>

        <form action="tasks/delete" method="POSt">
    
            <button type="submit" class="btn clear-btn">Clear All</button>

        </form>

        <span class="clearfix"></span>

    </div>

    <div class="task-add-form">

        <form action="tasks" method="POST">

            <input type="text" name="description" placeholder="Name of the task" required>
                
            <button type="submit" class="btn submit-btn">Add</button>
    
        </form>

    </div>


    <?php require 'partials/footer.php'; ?>
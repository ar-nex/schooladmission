

<div class="container" style="margin-top: 70px;">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
        
        <li class="active">Admitted students</li>
    </ol>
    <h1>Admitted <?php echo $category; ?> students</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL no.</th>
                    <th>Name</th>
                    <th>Form no</th>
                    <th>Section</th>
                    <th>Roll</th>
                    <th>Sub 1</th>
                    <th>Sub 2</th>
                    <th>Sub 3</th>
                    <th>Adl</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0;
                if ($d) {
                     foreach ($d as $r) {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo ++$i;
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['name'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['form_id'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['section'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['roll'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['el1'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['el2'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['el3'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $r['adl'];
                    echo '</td>';
                    
                    echo '</tr>';
                }
                }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
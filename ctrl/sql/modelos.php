<?php
                 while ($row4 = mysqli_fetch_assoc($result4modelo))
                 {
                  echo "<option value=".$row4['nombre'].">".$row4['nombre']."</option>";
                 }
                 ?> 
                 
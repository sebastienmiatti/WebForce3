<label>Date de naissance :</label><br/>

        <select>
            <?php
            for($i = 1; $i <= 31; $i++){
                echo '<option>' . substr('0'.$i, -2) . '</option>';
            }
            ?>
        </select>


        <select>
            <option value="01">Janvier</option>
            <option value="02">Fevrier</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">août</option>
            <option value="09">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
        </select>



        <select name="annee">
            <?php
                $i = date('Y') - 0;
                while($i >= 1900 ){
                    echo '<option>' . $i . '</option>';
                    $i --;
                }
            ?>
        </select><br/><br/>

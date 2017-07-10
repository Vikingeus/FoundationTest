<?php 
class card {
    function getSlider($name ,$id, $max, $min, $init, $step, $type, $dataType) {
        return '
            <tr>
                <td><p class="hollow button">'.$name.'</p></td>
                <td width="280px">
                    <div class="slider" data-slider data-start="'.$min.'" data-initial-start="'.$init.'" data-end="'.$max.'" data-step="'.$step.'">
                        <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="server'.$type.'_'.$id.'"></span>
                        <span class="slider-fill" data-slider-fill></span>
                    </div>
                </td>
                <td width="120px"><input type="number" id="server'.$type.'_'.$id.'"></td>
                <td><p class="hollow button secondary">'.$dataType.'</p></td>
            </tr>';
    }
    function getSwitch($id, $name, $type, $check) {
        return '
        <div class="grid-x grid-margin-x up-2">
            <div class="auto cell">'.$name.'</div>
            <div class="shrink cell">
                <div class="switch small">
                    <input class="switch-input" id="'.$type.'_'.$id.'" type="checkbox" '.$check.' name="'.$type.'_'.$id.'">
                    <label class="switch-paddle" for="'.$type.'_'.$id.'">
                        <span class="show-for-sr">'.$name.'</span>
                        <span class="switch-active" aria-hidden="true"><i class="fa fa-play" aria-hidden="true"></i></span>
                        <span class="switch-inactive" aria-hidden="true"><i class="fa fa-stop" aria-hidden="true"></i></span>
                    </label>
                </div>
            </div>
        </div>';
    }
    function CreateCard($id, $name, $mail, $date, $mob, $icon, $apache, $mysql, $backup, $an, $ram, $ds, $cpu)  {
        if($apache == "on"){
            $apacheChecked = "checked";
        }
        if($mysql == "on"){
            $mysqlChecked = "checked";
            $apacheChecked = "checked";
        }
        if($backup == "on"){
            $backupChecked = "checked";
            $apacheChecked = "checked";
        }
        if($an == "on"){
            $anChecked = "checked";
            $apacheChecked = "checked";
        }
        echo '
            <div class="cell margin30" >
                <div class="card">
                    <div class="card-divider grid-x grid-margin-x up-2">
                        <h4 class="auto cell">ID: '.$id.'</h4>
                        <div class="reveal" id="modal_'.$id.'" data-reveal>
                            <h1>'.$name.'<small> ID: '.$id.'</small></h1>
                            <ul class="accordion" data-accordion>
                                <li class="accordion-item is-active" data-accordion-item>
                                    <a href="#" class="accordion-title">Info</a>
                                    <div class="accordion-content" data-tab-content>
                                        <table>
                                            <tr>
                                                <td>Name:</td>
                                                <td>'.$name.'</td>
                                            </tr>
                                            <tr>
                                                <td>ID:</td>
                                                <td>'.$id.'</td>
                                            </tr>
                                            <tr>
                                                <td>Image:</td>
                                                <td><img src="png/'.$icon.'.png" width="48px"></td>
                                            </tr>
                                            <tr>
                                                <td>Date created:</td>
                                                <td>'. $date .'</td>
                                            </tr>
                                            <tr>
                                                <td>Mail:</td>
                                                <td>'.$mail.'</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile:</td>
                                                <td>'.$mob.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li class="accordion-item" data-accordion-item>
                                    <a href="#" class="accordion-title">Basic server settings</a>
                                    <div class="accordion-content" data-tab-content>';
                                                echo $this->getSwitch($id, "Apache2", "lApache2", $apacheChecked);
                                                echo $this->getSwitch($id, "MySQL", "lMySQL", $mysqlChecked);
                                                echo $this->getSwitch($id, "Backup", "lBackup", $backupChecked);
                                                echo $this->getSwitch($id, "Analytics Server", "lAnalyticsServer", $anChecked);
                                        echo '
                                    </div>
                                </li>
                                <li class="accordion-item" data-accordion-item>
                                    <a href="#" class="accordion-title">Advanced server settings</a>
                                    <div class="accordion-content" data-tab-content>
                                        <table>';
                                                echo $this->getSlider("Server memory", $id, "16384", "256", $ram, "256", "serverMemory", "Mb"); 
                                                echo $this->getSlider("CPU", $id, "64", "1", $cpu, "1", "serverCPU", "cores"); 
                                                echo $this->getSlider("Disk space", $id, "128", "1", $ds, "1", "serverDS", "Gb"); 
                                            echo '
                                        </table>
                                    </div>
                                </li>
                            </ul>
                            <button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>
                            <button class="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            <div class="expanded button-group">
                                <a class="button success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save settings</a>
                                <a class="button secondary"><i class="fa fa-hdd-o" aria-hidden="true"></i> Fast backup</a>
                                <a class="button alert"><i class="fa fa-trash" aria-hidden="true"></i> Delete server</a>
                            </div>
                        </div>
                        <button class="hollow button shrink cell" data-open="modal_'.$id.'">More</button>
                    </div>
                    <img src="png/'.$icon.'.png">
                    <div class="card-section">
                        <h4>Server settings</h4>
                        ';
                                    echo $this->getSwitch($id, "Apache2", "sApache2", $apacheChecked);
                                    echo $this->getSwitch($id, "MySQL", "sMySQL", $mysqlChecked);
                                    echo $this->getSwitch($id, "Backup", "sBackup", $backupChecked);
                                    echo $this->getSwitch($id, "Analytics Server", "sAnalyticsServer", $anChecked);
                        echo '
                    </div>
                </div>
            </div>';
    }
}
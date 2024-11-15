<?php
    get_header();
    $page_id = get_the_ID();

    $sec1 = get_field('wiki', $page_id);
?>

    <section class="wikiSection1">
        <div class="container-fluid pe-0">
            <div class="container-leftPadding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wikiSec1-cont">
                            <span class="fs-xs"><?php echo $sec1['sub_heading'] ?></span>

                            <?php 
                                $section = $sec1['sub_detail_content'];
                                foreach( $section as $sec ) { 
                            ?> 
                                <h3 class="fs-lg1"><?php echo $sec['heading']; ?></h3>

                                <?php echo $sec['content']; ?>

                            <?php } ?>

                            <div class="img">
                                <img src="<?php echo $sec1['left_image'] ?>" alt="Shibana">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="wikiSec1-right">
                            <div class="img">
                                <img src="<?php echo $sec1['right_image'] ?>" alt="Shibana">
                            </div>
                            <div class="detailTabel">
                                <table>
                                    <?php 
                                        $section = $sec1['detail_table'];
                                        foreach( $section as $sec ) { 
                                    ?>
                                        <tr>
                                            <th><?php echo $sec['key']; ?></th>
                                            <td><?php echo $sec['value']; ?></td>
                                        </tr>

                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="wikiSec1-bottomCont">
                <?php 
                    $section = $sec1['detail_content'];
                    foreach( $section as $sec ) { 
                ?> 
                    <h4 class="fs-lg1"><?php echo $sec['heading']; ?></h4>

                    <?php echo $sec['content']; ?>

                <?php } ?>


                <!-- <h4 class="fs-lg1">PERSONALITY</h4>
                <p class="fs-p4">Shibana is a whimsical carefree man who doesn't spend his time worrying about the stresses of life or whether something is good or bad. He has a simple yet extreme belief that ones freedom is equivalent to their power and that all one needs to do to be happy is to simply be the strongest. He believes that those with power will always end up controlling those weaker then them.</p>
                <p class="fs-p4">Shibana is shown to be extremely hedonistic and has a complete lack of respect for authority. He does whatever he feels like when he feels like it and doesn't take the feelings of others into consideration when doing so, believing himself to be superior to others. He doesn't have a bracelet to track his score and when asked about it questions why he would need a tracking device strapped to his arm like an animal. When Shibana wants or needs something like food or transportation he simply takes it by force. When others try to assert their authority over him Shibana reacts violently and shows a complete lack of remorse for his victims. Shibana takes an interest in Kelvin due to Kelvin's own seeming lack of care for the authority of others and encourages Kelvin to become stronger so others can't push their will on him.</p>


                <h4 class="fs-lg1">Abilities</h4>
                <p class="fs-p4">
                    <b>SuperHuman Strength :</b> Shibana has enough physical strength as a regular human to kick down a metal gate with ease. He's also able to rip the tongue out of a person's mouth while they're in the middle of talking. <br>
                    <b>Superhuman Durability :</b> Shibana has enough durability to take a gunshot to the head without any signs of injury. <br>
                    <b>Thermogear Activation :</b> Mayhem Devil <br>
                    Shibana has the ability to transform into his Mayhem Devil form at will. Upon doing so he is shrouded in flames and his clothing incinerates. He then dawns a straight jacket with several belts on it, a belt on the back having a pointed tip and resembling a devils tail, he grows twisted megalic horns and a pair of goggles with spiraling eyes. <br>
                    <b>Enhanced Temperature :</b> Upon entering his Mayhem Devil state Shibana's body temperature increases to 200,000°C
                </p>

                <h4 class="fs-lg1">RELATIONSHIPS</h4>
                <p class="fs-p4">
                    <b>Kelvin :</b> After finding a mutual love for classical music and discovering some of Kelvin's odd behavior Shibana takes an interest in Kelvin and explains his philosophy and lifestyle to Kelvin who appears mostly afraid of him.
                </p>

                <h4 class="fs-lg1">QUOTES</h4>
                <p class="fs-p4"><b>“Kelvin, if you want to thrive in this world then you need to accept that power is the only thing that matters. Those with power tend to believe they are superior and that they have the right to control the thoughts and actions of those they see as inferior to them.” - Chapter 1
                    </b></p> -->
            </div>
        </div>
    </section>

<?php get_footer(); ?>
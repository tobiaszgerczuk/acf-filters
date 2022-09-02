{{--
  Title: Case Study
  Description: Case Study
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  PostTypes: page post
  EnqueueStyle: styles/style.css
  EnqueueScript: scripts/script.js

--}}

<div data-{{ $block['id'] }} class="{{ $block['classes'] }}">
    <div class="casestudy__filters">
        <button class="casestudy__filters__btn--default btn active" id="all">All</button>

        <?php $lop = []; ?>
        <?php if( have_rows('case_study') ): ?>            
                <?php 
                    $all = get_sub_field_object('rodzaj');
                    $select = get_sub_field('rodzaj');
                    $value = $all['value'];   
                ?>
                
                <?php foreach( $all['choices'] as $k => $v ): ?>
                <button class="casestudy__filters__btn--default btn" id="<?php echo $k; ?>"><?php echo $v; ?>  </button>
                <?php $lop[] = $v; ?>
                <?php 
                    $cases[] = array(
                        'value' => $k,
                        'label' => $v
                    );
                ?>
                <?php endforeach; ?>

                <?php  $lop = []; ?>

                <?php foreach( $select as $selector ): ?>
                    <?php $lop[] = $selector['value']; ?>
                <?php endforeach; ?>
          
 
        
        <?php endif; ?>
    </div>

    <div id="parent" class="boxes">
        <?php
            if( have_rows('case_study') ):
            while( have_rows('case_study') ) : the_row();
            $rodzaje = get_sub_field('rodzaj');
        ?>
            <div class="boxes__box <?php foreach($rodzaje as $rodzaj) { echo $rodzaj['value']." "; } ?>">
                <div class="box_container">
                    <?php if (get_sub_field('obrazek')) : ?>
                        <img src="<?php echo get_sub_field('obrazek'); ?>" alt="">
                    <?php endif; ?>
                    <div class="boxes__box__content">               
                                            <div class="boxes__box__cats">
                            <?php foreach($rodzaje as $rodzaj) {
                                echo "<div class='boxes__box__cats__rodzaj'>".$rodzaj['value']."</div>";
                                }
                                ?>
                        </div>
                        <div class="boxes__box__title">
                            <?php if (get_sub_field('tytul')) : ?>
                                <h2><?php echo get_sub_field('tytul'); ?></h2>
                            <?php endif; ?>
                            <?php if(get_sub_field('link')) : ?>
                                <a href="<?php echo get_sub_field('link')['url']; ?>"><?php echo get_sub_field('link')['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            else :
            endif;
        ?>

    </div>
</div>



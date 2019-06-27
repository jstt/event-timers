<?php
/**
 * @file
 * Contains \Drupal\event_timers\Plugin\Block\EventTimersBlock.
 */

namespace Drupal\event_timers\Plugin\Block;

use DateTime;
use Drupal;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Provides a "Event Timers" block.
 *
 * @Block(
 *   id = "jquery_countdown_timer",
 *   admin_label = @Translation("Countdown Timer")
 * )
 */
class EventTimersBlock extends BlockBase
{
  
  private $nodeDate = null;
  
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    
    //$font_size          = 28;
    //$dt                 = new DateTime('tomorrow');
    //$countdown_datetime = $dt->format('Y-m-d H:i:s');
    //
    //return ['countdown_datetime' => $countdown_datetime, 'font_size' => $font_size];
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    
    //$form['jquery_countdown_timer_date']      = [
    //    '#type'              => 'datetime',
    //    '#title'             => t('Timer date'),
    //    '#required'          => 1,
    //    '#default_value'     => new DrupalDateTime($this->configuration['countdown_datetime']),
    //    '#date_date_element' => 'date',
    //    '#date_time_element' => 'time',
    //    '#date_year_range'   => '2016:+50',
    //];
    //$form['jquery_countdown_timer_font_size'] = [
    //    '#type'          => 'number',
    //    '#title'         => t('Timer font size'),
    //    '#default_value' => $this->configuration['font_size'],
    //    '#required'      => 1
    //];
    
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    
    //$dt                                        = $form_state->getValue('jquery_countdown_timer_date');
    //$this->configuration['countdown_datetime'] = $dt->format('Y-m-d H:i:s');
    //$this->configuration['font_size']          = $form_state->getValue('jquery_countdown_timer_font_size');
  }
  
  /**
   * {@inheritdoc}
   */
  public function build()
  {
  
    //$build            = [
    //    'content' => [
    //        '#cache' => [
    //            'max-age' => 0,
    //        ]
    //    ]
    //];
    $markup           = '';
    
    $node = \Drupal::request()->attributes->get('node');
    $type = $node->getType();
    
    if($type === 'event') {
      
      $eventDate = $node->get('field_event_date')->value;
  
      $our_service = Drupal::service('event_timers.get_days_service');
      $markup = $our_service->getRemainingDays($eventDate);
  
      //$build['content'] = [
      //    '#markup' =>$markup
      //];
    }
    
    
    
    
    //$nids = \Drupal::entityQuery('node')
    //               ->condition('status', 1)
    //               ->condition('type', 'event')
    //               ->execute();
    //
    //$nodes = Node::loadMultiple($nids);
    //
    //$settings = [
    //    'unixtimestamp' => strtotime($this->configuration['countdown_datetime']),
    //    'fontsize'      => $this->configuration['font_size'],
    //];
    //$markup = '';
  
    //if(Drupal::routeMatch()->getParameter('node')){
    //
    //  $nid = Drupal::routeMatch()->getParameter('node');
    //  $node = Node::load($nid->id());
    //
    //  $this->nodeDate = $node->get('field_event_date')->getValue();
    //
    //} else {
    //
    //  $this->nodeDate = NULL;
    //}
  
  
  
    //foreach ($nodes  as $key => $node) {
    //
    //    $item = $node->getTypedData();
    //    $item1 = $node->getFields();
    //    $date = $node->get('field_event_date');
    //    $arr = $node->toArray();
    //
    //    $time = new DateTime($node->get('field_event_date')->value);
    //    $format = $time->format('Y-m-d H:i:s');
    //  $until = strtotime($format);
    //
    //    $markup .= '<div id="timer-'.$node->id().'"><div class="jquery-countdown-timer" data-title = "'. $node->getTitle() .'"  data-id = "'. $node->id() .'" data-endtime="'. $until .'"></div><div class="jquery-countdown-timer-note"></div></div>';
    //}
  
    $build['content'] = [
        '#markup' => '<h1>'. $markup . '</h1>',
        // FUCK that !!!
        '#cache' => [
            'max-age' => 0,
        ]
    ];
    
    // Attach library containing css and js files.
    //$build['#attached']['library'][]                   = 'event_timers/event.timers';
    //$build['#attached']['drupalSettings']['countdown'] = $settings;
    
    return $build;
  }
}

?>

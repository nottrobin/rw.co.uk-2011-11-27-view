<?php
$error_status = array(
    '400' => array(
        'heading' => 'Bad Request',
        'paragraphs' => array(
            'Ummm... Duh?',
            'Sorry, the server\'s being a bit dumb and could not understand your request.',
        ),
    ),
    '401' => array(
        'heading' => 'Unauthorized',
        'paragraphs' => array(
            'Denied.',
            'You aren\'t special enough to access this bit.',
        )
    ),
    '402' => array(
        'heading' => 'Payment Required',
        'paragraphs' => array( 'Sorry, you need to pay first.', )
    ),
    '403' => array(
        'heading' => 'Forbidden',
        'paragraphs' => array(
            'Denied.',
            'Sorry, you\'re just not allowed here. It\'s nothing personal - no-one is.',
        )
    ),
    '404' => array(
        'heading' => 'Not Found',
        'paragraphs' => array(
            'Huh?',
            'We can\'t find that page.',
        )
    ),
    '405' => array(
        'heading' => 'Method Not Allowed',
        'paragraphs' => array(
            'This path is blocked.',
            'Try a different method.',
        )
    ),
    '500' => array(
        'heading' => 'Internal Server Error',
        'paragraphs' => array(
            'Ulp. The server broke.',
            'If you can please email <a href="mailto:robin@robinwinslow.co.uk">robin@robinwinslow.co.uk</a> explaining what you were up to.',
        )
    ),
    '501' => array(
        'heading' => 'Not Implemented',
        'paragraphs' => array(
            'We\'re not ready for you to be here yet.',
            'Maybe try in a few weeks?',
        )
    ),
    '502' => array(
        'heading' => 'Bad Gateway',
        'paragraphs' => array(
            'Gateway? What\'s a gateway?',
        )
    ),
    '503' => array(
        'heading' => 'Service Unavailable',
        'paragraphs' => array(
            'This service isn\'t available. (In case you didn\'t read the heading).',
        )
    ),
    '504' => array(
        'heading' => 'Gateway Timeout',
        'paragraphs' => array(
            'Things are running a bit slowly. Maybe try again?',
        )
    ),
    '505' => array(
        'heading' => 'HTTP Version Not Supported',
        'paragraphs' => array(
            'Hmm. You\'re using a weird HTTP version. I don\' even know which ones we support, just the usual ones. I think our server\'s Nginx, in case that helps?',
        )
    ),
);

$status = empty($_GET['status']) ? '404' : $_GET['status'];
$this_status = $error_status[$status];

?>

<h1>
  <?= $status ?> Error - <?= $this_status['heading'] ?>
</h1>

<? foreach( $this_status['paragraphs'] as $paragraph ): ?>
<p><?= $paragraph ?></p>
<? endforeach ?>
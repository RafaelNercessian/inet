<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
$repeaterRows = get_sub_field('event');

function processDate($dateString)
{
    if (empty($dateString)) return null;
    $dateTime = DateTime::createFromFormat('F j, Y', esc_html($dateString));
    if ($dateTime === false) return null;
    return [
        'day' => intval($dateTime->format('d')),
        'month' => intval($dateTime->format('n')),
        'year' => intval($dateTime->format('Y')),
        'monthName' => $dateTime->format('F'),
        'dayOfWeek' => $dateTime->format('l')
    ];
}

?>
<section class="events">
    <section class="container d-flex align-items-start vh-100 row mx-auto justify-content-between">
        <section class="col-lg-6">
            <h2 class="welcome__title"><?= $title ?></h2>
            <h3 class="welcome__subtitle fw-normal"><?= $subtitle ?></h3>
            <p class="h6 welcome__content my-1"><?= $content ?></p>
            <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase welcome__anchorlink">Our story<i
                        class="icon-long-arrow-right"></i></a>
        </section>
        <section class="col-lg-5">
            <?php
            if ($repeaterRows):
                foreach ($repeaterRows as $id => $row):
                    $marginClass = ($id !== 0) ? 'mt-2' : ''; ?>
                    <section class="<?= $marginClass ?>">
                        <h3 class="text-decoration-underline"><?= esc_html($row['event_name']); ?></h3>
                        <?php
                        //Details for date one
                        $dateOne = processDate($row['date']);
                        $dateTwo = processDate($row['date_day_two']);
                        if ($dateOne):
                            if (empty($dateTwo)): ?>
                                <div class="d-flex align-items-start mt-2 ml-1 gap-1">
                                    <i class="icon-date"></i>
                                    <p class="mb-0 h6"><?= $row['date']; ?></p>
                                </div>
                            <?php elseif ($dateOne['month'] == $dateTwo['month'] && $dateOne['year'] == $dateTwo['year']): ?>
                                <div class="d-flex align-items-start mt-2 ml-1 gap-1">
                                    <i class="icon-date"></i>
                                    <p class="mb-0 h6">
                                        <?= $dateOne['monthName'] . ' ' . $dateOne['day'] . '-' . $dateTwo['day'] . ', ' . $dateOne['year']; ?>
                                    </p>
                                </div>
                            <?php endif;
                        endif; ?>
                        <div class="d-flex align-items-start mt-1 gap-1">
                            <i class="icon-map-pin"></i>
                            <p class="mb-0 h6"><?= esc_html($row['address']); ?></p>
                        </div>
                        <div class="d-flex align-items-start mt-1 gap-1">
                            <i class="icon-time"></i>
                            <div>
                                <p class="mb-0 h6"><?= esc_html($dateOne['dayOfWeek']) . ' ' . str_replace(' ', '', esc_html($row['time_event_starts'])) . '-' . str_replace(' ', '', esc_html($row['time_event_ends'])); ?></p>
                                <?php if (!empty($row['time_event_starts_day_two']) && !empty($row['time_event_ends_day_two'])): ?>
                                    <p class="mb-0 h6"><?= esc_html($dateTwo['dayOfWeek']) . ' ' . str_replace(' ', '', esc_html($row['time_event_starts_day_two'])) . '-' . str_replace(' ', '', esc_html($row['time_event_ends_day_two'])); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php endforeach;
            else:?>
                <h3 class="text-decoration-underline">No upcoming events at the moment!</h3>
            <?php endif;
            ?>
        </section>
    </section>
</section>
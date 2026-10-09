<?php
declare(strict_types=1);

const APP_TIMEZONE = 'Asia/Manila';
const GRACE_PERIOD_MINUTES = 20;
const NO_SHOW_LIMIT_30_DAYS = 3;
const NO_SHOW_BLOCK_DAYS = 7;
const BOOKING_START_SLOT_MINUTES = 30;
const MAX_RESERVATION_MINUTES = 240;

function next_booking_start_minutes(?DateTimeImmutable $now = null): int
{
	$now ??= new DateTimeImmutable('now');
	$seconds_since_midnight = ((int) $now->format('G') * 3600)
		+ ((int) $now->format('i') * 60)
		+ (int) $now->format('s');

	return (int) (ceil($seconds_since_midnight / (BOOKING_START_SLOT_MINUTES * 60)) * BOOKING_START_SLOT_MINUTES);
}

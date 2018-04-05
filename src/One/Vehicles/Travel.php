<?php

namespace Katsana\Sdk\One\Vehicles;

use Katsana\Sdk\One\Request;
use Laravie\Codex\Contracts\Response;

class Travel extends Request
{
    /**
     * Get travel for today.
     *
     * @param int $vehicleId
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function today(int $vehicleId): Response
    {
        return $this->send(
            'GET',
            "vehicles/{$vehicleId}/travels/today",
            $this->getApiHeaders()
        );
    }

    /**
     * Get travel for yesterday.
     *
     * @param int $vehicleId
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function yesterday(int $vehicleId): Response
    {
        return $this->send(
            'GET',
            "vehicles/{$vehicleId}/travels/yesterday",
            $this->getApiHeaders()
        );
    }

    /**
     * Get travel for the date.
     *
     * @param int $vehicleId
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function date(int $vehicleId, int $year, int $month = 1, int $day = 1): Response
    {
        return $this->send(
            'GET',
            "vehicles/{$vehicleId}/travels/{$year}/{$month}/{$day}",
            $this->getApiHeaders()
        );
    }

    /**
     * Get travel for a duration.
     *
     * @param int    $vehicleId
     * @param string $start
     * @param string $end
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function duration(int $vehicleId, string $start, string $end): Response
    {
        return $this->send(
            'GET',
            "vehicles/{$vehicleId}/travels/duration",
            $this->getApiHeaders(),
            compact('start', 'end')
        );
    }
}

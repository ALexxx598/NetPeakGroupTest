<?php

class GetActivityResponse
{
    /**
     * @param string $activity
     * @param HolidayType $type
     * @param int $participants
     * @param float $price
     * @param string $link
     * @param int $key
     * @param float $accessibility
     */
    private function __construct(
        private string $activity,
        private HolidayType $type,
        private int $participants,
        private float $price,
        private string $link,
        private int $key,
        private float $accessibility,
    ) {
    }

    /**
     * @param string $activity
     * @param HolidayType $type
     * @param int $participants
     * @param float $price
     * @param string $link
     * @param int $key
     * @param float $accessibility
     * @return self
     */
    public static function make(
        string $activity,
        HolidayType $type,
        int $participants,
        float $price,
        string $link,
        int $key,
        float $accessibility,
    ): self {
        return new self(
            activity: $activity,
            type: $type,
            participants: $participants,
            price: $price,
            link: $link,
            key: $key,
            accessibility: $accessibility
        );
    }

    /**
     * @return string
     */
    public function getActivity(): string
    {
        return $this->activity;
    }

    /**
     * @return HolidayType
     */
    public function getType(): HolidayType
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getParticipants(): int
    {
        return $this->participants;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return int
     */
    public function getKey(): int
    {
        return $this->key;
    }

    /**
     * @return float
     */
    public function getAccessibility(): float
    {
        return $this->accessibility;
    }

    public function toArray(): array
    {
        return [
            'activity' => "Activity -" . $this->activity,
            'type' => 'Type - ' . $this->type->value,
            'participants' => 'Participants - ' . $this->participants,
            'price' => 'Price - ' . $this->price,
            'link' => 'Link - ' . (empty($this->link) ? 'Not data' : $this->link),
            'key' => 'Key - ' . $this->key,
            'accessibility' => 'Accessibility - ' . $this->accessibility,
        ];
    }
}
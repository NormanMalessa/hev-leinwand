<?php

namespace AppBundle\Screen\Effect;

use Psr\Cache\CacheItemPoolInterface;

class EffectsRepository
{
    const CACHE_KEY = 'screen.effects.repository';

    /** @var CacheItemPoolInterface */
    private $cache;

    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $id
     * @param array $data
     */
    public function setEffect(string $id, array $data)
    {
        $item = $this->cache->getItem(self::CACHE_KEY);
        $item->set(new Effect($id, '', $data));
        $this->cache->save($item);
    }

    /**
     * @return Effect
     */
    public function get()
    {
        $item = $this->cache->getItem(self::CACHE_KEY);
        if ($item->isHit())
        {
            return $item->get();
        }

        $effect = new Effect('', '');
        $item->set($effect);
        $this->cache->save($item);
        return $effect;
    }

    /**
     * @return Effect[]
     */
    public function getAll()
    {
        // @TODO this should come from the database
        return [
            new Effect('goal', 'Tor'),
            new Effect('goalscorer', 'Torschütze', ['number']),
            new Effect('penalty', 'Strafzeit'),
            new Effect('darken', 'Abdunkeln'),
            new Effect('broken', 'Gebrochenes Glas'),
            new Effect('rubberduck', 'Gummihuhn'),
            new Effect('snowflakes', 'Schneeflocken')
        ];
    }
}
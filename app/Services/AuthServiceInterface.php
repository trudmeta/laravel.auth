<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface AuthServiceInterface
{
    /**
     * Creates new resource.
     *
     * @param array $params
     *
     * @return void
     */
    public function create();

    /**
     * Get the resource.
     *
     * @param int $id
     * @param array $params
     *
     * @return Collection
     */
    public function get();

    /**
     * Deletes the resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete();

    /**
     * Check if allowed auth.
     *
     * @param int $id
     *
     * @return bool
     */
    public function isAllowedAuth();
}

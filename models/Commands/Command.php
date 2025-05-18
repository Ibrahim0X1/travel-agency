<?php
interface Command {
    public function execute(): bool;
    public function undo(): bool;
}
?>
<?php

namespace App\Console\Components\Trello;

use App\Events\Trello\TodosFetched;
use Illuminate\Console\Command;
use Trello\Model\Board;
use Trello\Model\Cardlist;
use Trello\Manager;
use Trello\Model\Card;

class FetchTodo extends Command
{
    protected $signature = 'dashboard:fetch-todos';

    protected $description = 'Fetch tasks for each staff member from Trello';

    public function handle()
    {
        /** @var Manager $t */
        $t = \Trello::manager();

        /** @var Board $board */
        $board = $t->getBoard(config('services.trello.todos_board_id'));
        $lists = config('services.trello.todos_lists');

        $data = [];

        /** @var Cardlist $list */
        foreach($board->getLists() as $list) {
            if (!in_array($list->getName(), $lists)) {
                continue;
            }
            $data[$list->getName()] = [];
            /** @var Card $card */
            foreach($list->getCards() as $card) {
                $data[$list->getName()][] = $card->getName();
            }
        }

        event(new TodosFetched($data));
    }
}

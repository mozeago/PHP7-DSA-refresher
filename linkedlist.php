<?php
class ListNode
{
    public $data = null;
    public $next = null;
    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}
class LinkedList
{
    private $_firstNode = null;
    private $_totalNodes = 0;
    public function insertAtTheEnd(string $data = null)
    {
        $newNode = new ListNode($data);
        //list is empty
        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNodes++;
        return true;
    }
    public function display()
    {
        echo "Total book titles: " . $this->_totalNodes . "\n";
        $currentNode = $this->_firstNode;
        while ($currentNode != null) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }
    }
    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
        } else {
            $previousHead = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $previousHead;
        }
        $this->_totalNodes++;
        return true;
    }
    public function searchGivenNode(string $data = null)
    {
        if ($this->_totalNodes) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data == $data) {
                    return $currentNode->data . "\n";
                }
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }
    public function insertBeforeGivenNode(string $nodeToInsertBefore, string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode) {
            $previousNode = $this->_firstNode;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data = $nodeToInsertBefore) {
                    $newNode->next = $currentNode;
                    $previousNode->next = $newNode;
                }
                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }
    public function insertAfterGivenNode(string $dataToInsert = null, string $nodeToInsertAfter)
    {
        if ($this->_firstNode) {
            # code...
            #create a new node
            $newNode = new ListNode($dataToInsert);
            $nextNode = $this->_firstNode;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $nodeToInsertAfter) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                #$NextNode moves a step forward before $currentNode moves to next
                $nextNode = $currentNode->next;
            }
        }
    }
    public function deletingFirstNode()
    {
        # code...
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }
}

$BookTitles = new LinkedList();
$BookTitles->insertAtTheEnd("5");
$BookTitles->insertAtTheEnd("3");
$BookTitles->insertAtTheEnd("1");
$BookTitles->insertAtTheEnd("2");
$BookTitles->insertAtTheEnd("9");
$BookTitles->display();
$BookTitles->insertAtFirst("10");
$BookTitles->display();
$BookTitles->searchGivenNode("2");

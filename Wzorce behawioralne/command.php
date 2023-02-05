<?php
{
    private string $nick;

    public function __construct()
    {
        $this->nick = uniqnick();
    }

    public function getNick(): string
    {
        return $this->nick;
    }
}

interface CommandInterface
{
    public function execute(): void;
}

final class CommandInvoker
{
    private CommandInterface $command;

    public function setCommand(CommandInterface $command): void
    {
        $this->command = $command;
    }

    public function invoke(): void
    {
        $this->command->execute();
    }
}

interface VoiceInterface
{
    public function advocate(string $electoralId): void;

    public function against(string $electoralId): void;
}

final class Advocate implements CommandInterface
{
    public function __construct(
        private Electoral $electoral,
        private VoiceInterface $voice
    ) {}

    public function execute(): void
    {
        $this->voice->advocate($this->electoral->getNick());
    }
}

final class Sounding implements VoiceInterface
{
    public const ADVOCATE_VOICE = 'advocate';
    public const AGAINST_VOICE = 'against';

    public function __construct(
        private array $reactionStatistics = []
    ) {}

    public function advocate(string $electoralId): void
    {
        if ($this->shouldUndo($electoralId, self::ADVOCATE_VOICE)) {
            unset($this->reactionStatistics[$electoralId]);

            return;
        }

        $this->reactionStatistics[$electoralId] = self::ADVOCATE_VOICE;
    }

    public function against(string $electoralId): void
    {
        if ($this->shouldUndo($electoralId, self::AGAINST_VOICE)) {
            unset($this->reactionStatistics[$electoralId]);

            return;
        }

        $this->reactionStatistics[$electoralId] = self::AGAINST_VOICE;
    }

    public function countAdvocates(): int
    {
        $sums = array_count_values($this->reactionStatistics);

        return $sums[self::ADVOCATE_VOICE] ?? 0;
    }

    public function countAgainsts(): int
    {
        $sums = array_count_values($this->reactionStatistics);

        return $sums[self::AGAINST_VOICE] ?? 0;
    }

    private function shouldUndo(string $electoralId, string $reactionVoice): bool
    {
        return !empty($this->reactionStatistics[$electoralId])
            && ($this->reactionStatistics[$electoralId] === $reactionVoice);
    }
}

final class Against implements CommandInterface
{
    public function __construct(
        private Electoral $electoral,
        private VoiceInterface $voice
    ) {}

    public function execute(): void
    {
        $this->voice->against($this->electoral->getNick());
    }
}

?>
___________________________________________________________________________________________

Wrong code:

<?php
class Sounding
{
    private $voiceAdvocate = 0;
    private $voiceAgainst = 0;

    public function addVoiceAdvocate()
    {
        $this->voiceAdvocate += 1;
    }
    public function subtractVoiceAdvocate()
    {
        $this->voiceAdvocate -= 1;
    }

    public function getValueVoiceAdvocate()
    {
        return $this->voiceAdvocate;
    }

    public function addVoiceAgainst()
    {
        $this->voiceAgainst += 1;
    }
    public function subtractVoiceAgainst()
    {
        $this->voiceAgainst -= 1;
    }

    public function getValueVoiceAgainst()
    {
        return $this->voiceAgainst;
    }
}
?>

<?php
require_once 'Sounding.php';

$voice = new Sounding();

$voice->addVoiceAdvocate();
$voice->subtractVoiceAdvocate();
echo $voice->getValueVoiceAdvocate() . PHP_EOL;


$voice->addVoiceAgainst();
$voice->subtractVoiceAgainst();
echo $voice->addVoiceAgainst() . PHP_EOL;

?>

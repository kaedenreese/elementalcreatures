@push('css')
    @vite(['resources/css/howtoplay.css'])
@endpush

@push('js')
@endpush

@include('components.head')
<body>
@include('components.header')
<main>
        <nav>
            <h2>Table of Contents</h2>
            <ul class="table-of-contents">
                <li><img src="/images/creatures/sets/1/067.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#message">Message from Justin</a></li>
                <li><img src="/images/creatures/sets/1/003.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#overview">Overview</a></li>
                <li><img src="/images/creatures/sets/1/077.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#howtowin">How To Win</a></li>
                <li><img src="/images/creatures/sets/1/132.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#cardlayout">Card Layout</a></li>
                <li><img src="/images/creatures/sets/1/176.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#yourplayarea">Your Play Area</a></li>
                <li><img src="/images/creatures/sets/1/101.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#startingagame">Starting a Game</a></li>
                <li><img src="/images/creatures/sets/1/087.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#theround">The Round</a></li>
                <li><img src="/images/creatures/sets/1/143.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#earningpoints">Earning Points</a></li>
                <li><img src="/images/creatures/sets/1/028.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#playingcreatures">Playing Creatures</a></li>
                <li><img src="/images/creatures/sets/1/017.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#deckbuilding">Deckbuilding</a></li>
                <li><img src="/images/creatures/sets/1/066.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#elementguide">Element Guide</a></li>
                <li><img src="/images/creatures/sets/1/099.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#goldenrules">Golden Rules</a></li>
                <li><img src="/images/creatures/sets/1/161.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#keywords">Keywords</a></li>
                <li><img src="/images/creatures/sets/1/195.webp" class="table-of-contents-bullet" alt="Elemental Creature"> <a href="#resolvingeffects">Resolving Effects</a></li>
            </ul>
        </nav>

        <section>
            <img src="/images/creatures/sets/1/062.webp" class="how-to-play-float-right" alt="Elemental Creature">
            <div class="header-spacer" id="message"></div>
            <h2>A Message from Justin Hartsock</h2>
            <p class="quote">In my mind, I genuinely am looking to create something that brings others joy the same way many tabletop games and collectibles have done for me my entire life. Video games are great, but nothing beats sitting at a table with the right people living in the moment. If you're reading this, I sincerely <i>thank you</i> for taking the time and hope this little passion project of mine brings you and the ones around you some form of enjoyment and positivity.</p>
            <p class="signature">-Justin</p>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <img src="/images/creatures/sets/1/017.webp" class="how-to-play-float-left" alt="Elemental Creature">
            <div class="header-spacer" id="overview"></div>
            <h2>Overview</h2>
            <p>ELEMENTAL CREATURES is a fast, easy-to-learn trading card game where players build their frontline, level up creatures through the sideline, and compete to outplay and outscore their opponents.</p>
            <p><b>Simple system. Real strategy. Made to be played.</b></p>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <img src="/images/creatures/sets/1/029.webp" class="how-to-play-float-right" alt="Elemental Creature">
            <div class="header-spacer" id="howtowin"></div>
            <h2>How To Win</h2>
            <p>The first player to 20 points wins the game!</p>
            <p>Alternate Win Condition: the player with the most points at the end of 4 rounds wins the game. Any amount of rounds can be played as a tie breaker.</p>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>
        
        <section>
            <img src="/images/creatures/sets/1/109.webp" class="how-to-play-float-left" alt="Elemental Creature">
            <div class="header-spacer" id="cardlayout"></div>
            <h2>Card Layout</h2>
            <p>The Creature card is the only card type in the game. See its features below.</p>
            <img src="../images/howtoplay/card_layout.webp" alt="Card Layout" class="img-fit">
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <img src="/images/creatures/sets/1/195.webp" class="how-to-play-float-right" alt="Elemental Creature">
            <div class="header-spacer" id="yourplayarea"></div>
            <h2>Your Play Area</h2>
            <img src="../images/howtoplay/play-board.webp" alt="Your Play Area" class="img-fit">
            <p>Cards are played in 2 different areas: The <span class="frontline">FRONTLINE</span> and the <span class="sideline">SIDELINE</span>, known collectively as the "Play Area."</p>
            <p>Cards from your hand are played to the <span class="frontline">FRONTLINE</span>. Cards move to the <span class="sideline">SIDELINE</span> during gameplay. Players utilize their <span class="sideline">SIDELINE</span> cards to play higher level cards from their hand.</p>
            <p>Your deck is placed in the Deck area. Cards that are discarded during gameplay are placed in the owner's Discard.</p>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <img src="/images/creatures/sets/1/009.webp" class="how-to-play-float-left" alt="Elemental Creature">
            <div class="header-spacer" id="startingagame"></div>
            <h2>Starting a Game</h2>
            <ol>
                <li>Choose a random method to decide who goes first.</li>
                <li>Each player shuffles their respective deck.</li>
                <li>Each player draws 7 cards from their deck to form their hand.</li>
                <li>Up to twice per player, each player may choose to shuffle any number of cards in their hand back into their deck and draw back up to 7 cards.</li>
                <li>Once all players are ready, ROUND ONE begins with the first turn player.</li>
            </ol>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>
        
        <section>
            <img src="/images/creatures/sets/1/189.webp" class="how-to-play-float-right" alt="Elemental Creature">
            <div class="header-spacer" id="theround"></div>
            <h2>The Round</h2>
            <p>Players take turns performing 1 action each until both players decide to take no action for their turn, otherwise known as "passing." The collection of these turns is called the "Round."</p>
            <p>The first turn a player begins a Round by playing a card from their hand to their <span class="frontline">FRONTLINE</span>.</p>
            <p>When a player PASSES, they cannot take any more turns for the remainder of that Round. The last player that has NOT passed can take as many turns as they'd like. Once they choose to pass, the Round ends.</p>
            
            <h3>When the Round Ends:</h3>
            <ol>
                <li>Players calculate the total Power of Creatures on their respective <span class="frontline">FRONTLINES</span>.</li>
                <li>The player with the highest total earns points equal to the difference of those totals. See Earning Points.</li>
                <li>Players Rest their <span class="frontline">FRONTLINE</span> Creatures and Descend their <span class="sideline">SIDELINE</span> creatures.</li>
            </ol>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <img src="/images/creatures/sets/1/036.webp" class="how-to-play-float-left" alt="Elemental Creature">
            <div class="header-spacer" id="earningpoints"></div>
            <h2>Earning Points</h2>
            <p>When the Round ends, players calculate the total Power of the Creatures on their respective <span class="frontline">FRONTLINES</span>.</p>
            <p>Once total power is determined, the difference between them is calculated. In this example, Player A has a total Power of 5 while Player B has a total Power of 7, awarding Player B 2 points.</p>

            <aside><p>If the total Power of each player is equal, no player is awarded any points.</p></aside>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>
        
        <section>
            <div class="header-spacer" id="playingcreatures"></div>
            <h2>Playing Creatures</h2>
            <p>Every Creature has a LEVEL (found at the top left of each card). These indicate the requirement to play that card.</p>
            <h3>Requirements to Play Creatures</h3>
            <ul>
                <li>LEVEL 1: No requirement</li>
                <li>LEVEL 2: Return a Level 1 Creature from your <span class="sideline">SIDELINE</span> to your hand.</li>
                <li>LEVEL 3: Return a Level 2 Creature from your <span class="sideline">SIDELINE</span> to your hand.</li>
            </ul>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <div class="header-spacer" id="deckbuilding"></div>
            <h2>Deckbuilding</h2>
            <p>Each player's deck must follow the rules below.</p>
            <div class="grid-2">
                <div class="accent-box">Minimum of 40 cards</div>
                <div class="accent-box">Maximum of 90 cards</div>
                <div class="accent-box">Sideboard maximum of 10 cards</div>
                <div class="accent-box">Maximum of 3 copies of a card between Deck and Sideboard</div>
            </div>
            <aside><p>NOTE: A Sideboard is a collection of cards used for matches of multiple games.</p></aside>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <<section>
            <div class="header-spacer" id="elementguide"></div>
            <h2>Element Guide</h2>
            <img src="../images/howtoplay/elements.webp" alt="Element Guide" class="img-fit">
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <div class="header-spacer" id="goldenrules"></div>
            <h2 class="golden-header">Golden Rules</h2>
            <ol>
                <li>There is no minimum hand size.</li>
                <li>Players draw a card from their deck at the start of each Round, except the first.</li>
                <il>The player that earned the least points chooses the player that plays first for the next round.</il>
                <li>When a Round ends in a tie, the player that began that Round begins the next Round.</li>
                <li>Players do not lose by drawing all cards in their deck.</li>
                <li>If Round 4 ends in a tie, the game continues until a player earns any number of points.</li>
                <li>Power cannot be reduced below zero.</li>
                <li>Creatures may gain an indefinite amount of (-1) Power Counters. When the number of (-1) Power Counters on a Creature exceeds its Power, its Power is considered zero.</li>
                <li>(+1) and (-1) Power Counters cancel out. A Creature cannot have both.</li>
                <li>A Creature retains (-1) Power Counters when <i>Leveling Up</i>. However, they can be cancelled out when <i>Evolving</i> that Creature.</i></li>
                <li>Creatures keep all (+1) Power Counters when <i>Resting</i> or <i>Retreating</i> and remove all (-1) Power Counters when <i>Resting</i>. All Power Counters are removed when a creature leaves play.</li>
                <li>When a Creature becomes <i>Neutralized</i>, remove all Power Counters from them. <i>Neutralized</i> Creatures can't have or gain Power Counters.</li>
            </ol>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <div class="header-spacer" id="keywords"></div>
            <h2>Keywords</h2>
            <ul>
                <li><b>Ascend</b> - To move a Creature from <i>your</i> Discord to <i>your</i> <span class="sideline">SIDELINE</span>. This is not considered "playing" a card.</li>
                <li><b>Bounce</b> - To return an <i>opponent's</i> Creature from play to its owner's hand.</li>
                <li><b>Descend</b> - To move a Creature <i>you control</i> from <i>your</i> <span class="sideline">SIDELINE</span> to the Discard.</li>
                <li><b>Destory</b> - To remove a Creature from play by placing it in its owner's Discard.</li>
                <li><b>Disarm</b> - To remove a Creature's Effect. <b>DISARMED</b> Creatures are treated as if they no longer have an Effect.</li>
                <li><b>Evolve</b> - To <b>LEVEL UP</b> a Creature into another Creature of the same Species. When a creature <b>EVOLVES</b>, the new Creature enters play with (+1) Power Counters equal to the Power of the returned Creature.</li>
                <li><b>Exert</b> - To move a Creature <i>you control</i> from <i>your</i> <span class="sideline">SIDELINE</span> to <i>your</i> <span class="frontline">FRONTLINE</span></li>
                <li><b>Intimidate</b> - To move an <i>opponent's</i> Creature from their <span class="frontline">FRONTLINE</span> to their <span class="sideline">SIDELINE</span></li>
                <li><b>Level Up</b> - To play a Level 2 or higher Creature to your <span class="frontline">FRONTLINE</span> by returning a Creature of 1 level lower from your <span class="sideline">SIDELINE</span> to your hand. This is not considered <b>WITHDRAWING</b> a Creature.</li>
                <li><b>Mutate</b> - To <b>LEVEL UP</b> a Creature into a Creature of a different Species.</li>
                <li><b>Neutralize</b> - To render a Creature unable to contribute towards its owner's total Power. <b>NEUTRALIZED</b> Creatures are also <b>DISARMED</b>, cannot have or gain Power Counters, and still <b>REST</b> at the end of the Round.</li>
                <li><b>Rest</b> - To move a Creature from your <span class="frontline">FRONTLINE</span> to your <span class="sideline">SIDELINE</span>. When a creature <b>RESTS</b>, it is no longer <b>NEUTRALIZED</b> or <b>DISARMED</b> and all (-1) Power Counters are removed.</li>
                <li><b>Restore</b> - To remove the <b>DISARMED</b> and <b>NEUTRALIZED</b> statuses from a Creature.</li>
                <li><b>Retreat</b> - To move a Creature <i>you control</i> from <i>your</i> <span class="frontline">FRONTLINE</span> to <i>your</i> <span class="sideline">SIDELINE</span>.</li>
                <li><b>Taunt</b> - To move an <i>opponent's</i> Creature from their <span class="sideline">SIDELINE</span> to <i>their</i> <span class="frontline">FRONTLINE</span>.</li>
                <li><b>Teleport</b> - To shuffle a Creature into its owner's Deck.</li>
                <li><b>Venture</b> - To look at the specified number of cards from the top of your Deck and, in an order of your choosing, put them back on top of on the bottom of the Deck.</li>
                <li><b>Withdraw</b> - To return a Creature <i>you control</i> from play to <i>your</i> hand.</li>
            </ul>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>

        <section>
            <div class="header-spacer" id="resolvingeffects"></div>
            <h2>Resolving Effects</h2>
            <p>Card effects resolve by order of <b>LAST IN, FIRST OUT</b>. This means that the last card effect that triggered is the first to resolve, and resolution moves in reverse order of those triggered effects so that the first effect to trigger should be the last to resolve. When effects trigger simultaneously, the Turn Player resolves their effect first.</p>
            <aside>
                <h4>Example</h4>
                <ul>
                    <li>Both Player A and Player B control a "Kodemtha" on their <span class="frontline">FRONTLINE</span>. It is Player A's turn.</li>
                    <li>Player A plays "Omnigon", causing both players to draw 1 card.</li>
                    <li>Both "Kodemtha" trigger simultaneously, but Player A's "Kodemtha" will resolve first due to turn player priority.</li>
                </ul>
            </aside>
            <div class="return-to-top"><a href="#">Return to Top</a></div>
        </section>
    </main>

@include('components.footer')
</body>
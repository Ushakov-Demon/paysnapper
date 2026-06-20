<style>
.hero-device {
  position: relative;
  display: grid;
  place-items: center;
  min-height: 360px;
}
.phone-frame {
  width: clamp(200px, 20vw, 240px);
  aspect-ratio: 9 / 19;
  background: linear-gradient(160deg, #1a1a22, #0a0a0e);
  border-radius: 36px;
  padding: 12px;
  box-shadow:
    0 0 0 2px rgba(255,255,255,0.04),
    0 30px 90px rgba(0,0,0,0.6),
    0 0 80px var(--accent-red-glow);
  position: relative;
}
.phone-screen {
  width: 100%;
  height: 100%;
  border-radius: 30px;
  background:
    repeating-linear-gradient(135deg, transparent 0 20px, rgba(255,43,61,0.04) 20px 40px),
    linear-gradient(180deg, #050507, #0f0f15);
  padding: 26px 10px 10px;
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}
.phone-notch {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 90px; height: 22px;
  background: #000;
  border-radius: 0 0 14px 14px;
}
.phone-time {
  font-size: 0.7rem;
  font-weight: 600;
  color: rgba(255,255,255,0.5);
  text-align: right;
  padding-right: 4px;
  margin-bottom: 0.6rem;
  flex-shrink: 0;
}

/* ---- SMS notification ticker ---- */
.sms-feed {
  flex: 1;
  min-height: 0;
  overflow: hidden;
  -webkit-mask-image: linear-gradient(to bottom, transparent 0%, #000 14%, #000 86%, transparent 100%);
          mask-image: linear-gradient(to bottom, transparent 0%, #000 14%, #000 86%, transparent 100%);
}
.sms-feed-inner {
  display: flex;
  flex-direction: column;
  gap: 8px;
  animation: feed-scroll 22s linear infinite;
}
@keyframes feed-scroll {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-50%); }
}

.sms-card {
  background: rgba(28,28,34,0.92);
  backdrop-filter: blur(8px);
  border-radius: 12px;
  padding: 9px 11px;
  border: 1px solid rgba(255,255,255,0.06);
  flex-shrink: 0;
}
.sms-card-top {
  display: flex;
  align-items: center;
  gap: 6px;
  margin-bottom: 4px;
}
.sms-icon {
  width: 18px; height: 18px;
  border-radius: 5px;
  display: grid;
  place-items: center;
  font-weight: 700;
  font-size: 0.7rem;
  color: #fff;
  flex-shrink: 0;
  line-height: 1;
}
.sms-meta {
  font-size: 0.62rem;
  color: rgba(255,255,255,0.62);
  font-weight: 600;
  letter-spacing: 0.01em;
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.sms-time {
  font-size: 0.58rem;
  color: rgba(255,255,255,0.35);
  flex-shrink: 0;
}
.sms-amount-row { margin-bottom: 2px; }
.sms-amount {
  font-family: var(--font-display);
  font-size: 0.92rem;
  letter-spacing: 0.01em;
  line-height: 1;
}
.sms-sub {
  font-size: 0.6rem;
  color: rgba(255,255,255,0.48);
  line-height: 1.3;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Type variants */
.type-in .sms-icon    { background: rgba(74,222,128,0.18); color: var(--success-green); }
.type-in .sms-amount  { color: var(--success-green); }

.type-out .sms-icon   { background: rgba(56,189,248,0.18); color: #38bdf8; }
.type-out .sms-amount { color: #38bdf8; }

.type-settle .sms-icon   { background: rgba(255,43,61,0.20); color: var(--accent-red); }
.type-settle .sms-amount { color: var(--accent-red); }

/* Floating status chips around the phone */
.status-chip {
  position: absolute;
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  background: rgba(20,20,26,0.92);
  backdrop-filter: blur(8px);
  border: 1px solid var(--border-subtle);
  border-radius: 999px;
  padding: 0.5rem 0.85rem;
  font-size: 0.78rem;
  font-weight: 500;
  color: rgba(255,255,255,0.85);
  box-shadow: 0 8px 24px rgba(0,0,0,0.4);
}
.status-chip .dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: var(--success-green);
  box-shadow: 0 0 0 4px rgba(74,222,128,0.18);
  animation: pulse 2.2s ease-in-out infinite;
}
@keyframes pulse {
  0%, 100% { box-shadow: 0 0 0 4px rgba(74,222,128,0.18); }
  50%      { box-shadow: 0 0 0 8px rgba(74,222,128,0.05); }
}
.status-chip.chip-1 { top: 12%; left: -8%; }
.status-chip.chip-2 { top: 48%; right: -10%; }
.status-chip.chip-3 { bottom: 18%; left: -4%; }
</style>

<div class="phone-frame">
    <div class="phone-screen">
        <div class="phone-notch"></div>
        <div class="phone-time">9:49 AM</div>
        <div class="sms-feed">
            <div class="sms-feed-inner">
                <!-- set 1 -->
                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">just now</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">KES 12,400</span></div>
                    <div class="sms-sub">M-Pesa · order #5824 → settled to USDT</div>
                </div>

                <div class="sms-card type-out">
                    <div class="sms-card-top">
                        <span class="sms-icon">↑</span>
                        <span class="sms-meta">Payout sent</span>
                        <span class="sms-time">12s ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">USDT 1,200</span></div>
                    <div class="sms-sub">to merchant wallet · ref 91205</div>
                </div>

                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">38s ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">GHS 850</span></div>
                    <div class="sms-sub">MTN MoMo · order #2107 → settled to USD</div>
                </div>

                <div class="sms-card type-settle">
                    <div class="sms-card-top">
                        <span class="sms-icon">⇄</span>
                        <span class="sms-meta">Settlement complete</span>
                        <span class="sms-time">1m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">USD 3,240</span></div>
                    <div class="sms-sub">batch 88421 · wired to bank</div>
                </div>

                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">2m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">XOF 28,500</span></div>
                    <div class="sms-sub">Orange Money · order #4915 → settled to USDT</div>
                </div>

                <div class="sms-card type-out">
                    <div class="sms-card-top">
                        <span class="sms-icon">↑</span>
                        <span class="sms-meta">Payout sent</span>
                        <span class="sms-time">3m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">EUR 2,180</span></div>
                    <div class="sms-sub">to partner account · ref 88712</div>
                </div>

                <!-- set 2: duplicate for seamless ticker loop -->
                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">just now</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">KES 12,400</span></div>
                    <div class="sms-sub">M-Pesa · order #5824 → settled to USDT</div>
                </div>

                <div class="sms-card type-out">
                    <div class="sms-card-top">
                        <span class="sms-icon">↑</span>
                        <span class="sms-meta">Payout sent</span>
                        <span class="sms-time">12s ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">USDT 1,200</span></div>
                    <div class="sms-sub">to merchant wallet · ref 91205</div>
                </div>

                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">38s ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">GHS 850</span></div>
                    <div class="sms-sub">MTN MoMo · order #2107 → settled to USD</div>
                </div>

                <div class="sms-card type-settle">
                    <div class="sms-card-top">
                        <span class="sms-icon">⇄</span>
                        <span class="sms-meta">Settlement complete</span>
                        <span class="sms-time">1m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">USD 3,240</span></div>
                    <div class="sms-sub">batch 88421 · wired to bank</div>
                </div>

                <div class="sms-card type-in">
                    <div class="sms-card-top">
                        <span class="sms-icon">↓</span>
                        <span class="sms-meta">Payment received</span>
                        <span class="sms-time">2m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">XOF 28,500</span></div>
                    <div class="sms-sub">Orange Money · order #4915 → settled to USDT</div>
                </div>

                <div class="sms-card type-out">
                    <div class="sms-card-top">
                        <span class="sms-icon">↑</span>
                        <span class="sms-meta">Payout sent</span>
                        <span class="sms-time">3m ago</span>
                    </div>
                    <div class="sms-amount-row"><span class="sms-amount">EUR 2,180</span></div>
                    <div class="sms-sub">to partner account · ref 88712</div>
                </div>
            </div>
        </div>
    </div>
</div>